<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'email',
        'dokumen',
        'total_harga',
        'payment_link',  // Get the invoice URL from the response
        'download_token',
        'status',
        'invoice_id'
    ];

    protected $casts = [
        'dokumen' => 'array',
        'url_kadaluarsa' => 'datetime',
    ];
}
