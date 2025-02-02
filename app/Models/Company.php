<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $table = 'perseroan2';

    public function scopeFindByName($query, $keyword, $exact = false)
    {
        if ($exact) {
            return $query->where('nama_perseroan', '=', $keyword);
        }

        return $query->where('nama_perseroan', 'LIKE', '%' . $keyword . '%');
    }
}
