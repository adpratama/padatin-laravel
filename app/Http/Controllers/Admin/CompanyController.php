<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $show_per_page = $request->get('show_per_page', 25);
        $keyword = $request->get('keyword', '');

        // Query untuk mengambil data companies
        $companiesQuery = Company::query();

        // Jika ada keyword, tambahkan kondisi where like
        if (!empty($keyword)) {
            $companiesQuery->where('nama_perseroan', 'like', '%' . $keyword . '%'); // Tambahkan kolom lain yang ingin dicari
        }

        // Ambil hasil query dengan pagination
        $companies = $companiesQuery->paginate($show_per_page);

        $data = [
            'title' => 'Companies',
            'companies' => $companies,
            'per_page' => $show_per_page,
            'keyword' => $keyword
        ];

        return view('pages.admin.company.index', $data);
    }
}
