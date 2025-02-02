<?php


namespace App\Http\Controllers;

require_once base_path('vendor/autoload.php');

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;
use Illuminate\Support\Facades\Log;
use App\Mail\DownloadLinkMail;
use Illuminate\Support\Facades\Response;

class CheckoutController extends Controller
{

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
        }

        $total = array_sum(array_column($cart, 'price'));

        // $email = $request->email;
        $email = "adpratama.adp@gmail.com";

        // Set API Key
        Configuration::setXenditKey(config('services.xendit.secret'));

        // Create external ID for the invoice
        $external_id = 'INV-' . time();

        // Prepare invoice parameters
        $create_invoice_request = new CreateInvoiceRequest([
            'external_id' => $external_id,
            'payer_email' => $email,
            'description' => 'Pembelian Dokumen',
            'amount' => $total,
            'invoice_duration' => 172800, // 48 hours (in seconds)
            'currency' => 'IDR',
            'reminder_time' => 1
        ]);

        // Instantiate the Invoice API client
        $invoiceApi = new InvoiceApi();

        try {
            // Create the invoice using the API
            $invoice = $invoiceApi->createInvoice($create_invoice_request);
            $invoiceUrl = $invoice->getInvoiceUrl();

            // Store transaction details in your database
            $transaksi = Transaction::create([
                'email' => $email,
                'dokumen' => json_encode($cart),
                'total_harga' => $total,
                'payment_link' => $invoice->getInvoiceUrl(),  // Get the invoice URL from the response
                'download_token' => Str::random(32),
                'invoice_id' => $external_id,
                'status' => 'pending'
            ]);

            // Clear the cart
            session()->forget('cart');
            return view('pages.cart.checkout', ['invoiceUrl' => $invoiceUrl, 'title' => 'Checkout', 'totalItems' => 0]);
        } catch (\Xendit\XenditSdkException $e) {
            // Log the error to identify what went wrong
            Log::error('Xendit Invoice Creation Error:', [
                'error_message' => $e->getMessage(),
                'error_details' => $e->getFullError(),
            ]);

            // Handle error and return to cart page with error message
            return back()->with('error', 'Terjadi kesalahan saat membuat invoice.');
        }
    }

    public function xenditWebhook(Request $request)
    {
        $payload = $request->all();
        $invoice_id = $payload['external_id']; // Ambil invoice_id dari payload webhook
        $status = $payload['status']; // Status pembayaran (PAID)

        Log::info('Webhook received:', $payload); // Debugging log

        if ($status === 'PAID') {
            $transaction = Transaction::where('invoice_id', $invoice_id)->first();

            if ($transaction) {
                // Update status transaksi menjadi success
                $transaction->status = 'success';
                $transaction->url_kadaluarsa = now()->addHour(); // Aktif selama 1 jam
                $transaction->save();

                // Kirim email dengan link download
                Mail::to($transaction->email)->send(new DownloadLinkMail($transaction));

                return response()->json(['status' => 'success']);
            }
        }

        return response()->json(['status' => 'failed'], 400);
    }




    // Fungsi untuk memverifikasi signature jika menggunakan verifikasi
    private function verifySignature($payload, $signature, $secret_key)
    {
        // Implementasi verifikasi signature
        return hash_hmac('sha256', json_encode($payload), $secret_key) === $signature;
    }

    public function download($token)
    {
        // Cari transaksi berdasarkan token
        $transaction = Transaction::where('download_token', $token)->first();

        if (!$transaction) {
            return abort(404, 'Dokumen tidak ditemukan');
        }

        // Cek apakah link masih valid (tidak expired)
        if ($transaction->url_kadaluarsa < now()) {
            return abort(403, 'Link sudah kadaluarsa');
        }

        // Path ke dokumen yang sudah dibeli
        $filePath = storage_path('app/public/' . $transaction->file_path);

        return Response::download($filePath);
    }
}
