<?php

namespace App\Http\Controllers;

use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $cart = session()->get('cart', []);
        $totalItems = array_sum(array_column($cart, 'quantity'));

        $data = [
            'title' => 'Home',
            'totalItems' => $totalItems,
            'cart' => $cart,
        ];

        return view('pages.home.index', $data);
    }

    public function searchCompany(Request $request)
    {
        $keyword = $request->input('keyword');

        // Mengambil data menggunakan scope searchByName
        $results = Company::findByName($keyword)->get();

        if ($results->isNotEmpty()) {
            // Buat output HTML
            $output = '<ul>';
            foreach ($results as $r) {
                $output .= '<li class="search-result-item">';
                $output .= '<a href="' . route('home.searchResult', ['nama' => Str::slug($r->nama_perseroan)]) . '">' . e($r->nama_perseroan) . '</a>';

                $output .= '</li>';
            }
            $output .= '</ul>';

            // return response($output);
            return response($output)->header('Content-Type', 'text/html');
        } else {
            return response('<p class="text-muted">Tidak ada hasil ditemukan</p>');
        }
    }

    public function searchResult(Request $request)
    {
        $cart = session()->get('cart', []);
        $totalItems = array_sum(array_column($cart, 'quantity'));
        $total = array_sum(array_column($cart, 'price'));

        // Validasi input
        $request->validate([
            'nama' => 'required|string',
        ]);

        // Ambil dan proses input
        $get_nama = $request->get('nama');
        $nama = str_replace('-', ' ', $get_nama);

        // Cari hasil berdasarkan nama
        $result = Company::findByName($nama, true)->first();

        $data = [
            'title' => 'Search result of ' . $nama,
            'keyword' => $nama,
            'result' => $result,
            'totalItems' => $totalItems,
            'cart' => $cart,
            'total' => $total,
        ];

        return view('pages.home.search_result', $data);
    }
}
