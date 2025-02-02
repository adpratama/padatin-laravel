@extends('layouts.admin.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ $title }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 d-none d-sm-inline-block">
                            <form action="{{ route('admin.company') }}" method="get" autocomplete="off" novalidate>
                                <div class="row">
                                    <div class="col-auto">
                                        <select name="show_per_page" class="form-select" onchange="this.form.submit()">
                                            <option {{ $per_page == 10 ? 'selected' : '' }} value="10">10</option>
                                            <option {{ $per_page == 25 ? 'selected' : '' }} value="25">25</option>
                                            <option {{ $per_page == 50 ? 'selected' : '' }} value="50">50</option>
                                            <option {{ $per_page == 100 ? 'selected' : '' }} value="100">100</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="text" value="{{ $keyword }}" class="form-control"
                                            name="keyword" placeholder="Search…" aria-label="Search in website">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Tombol Search untuk mobile -->
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#searchModal" aria-label="Search">
                            <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </a>
                        <?php 
                        if (($keyword)) {
                            ?>
                        <a href="<?= route('admin.company') ?>" class="btn btn-warning d-none d-sm-inline-block"
                            aria-label="Reset search keyword" title="Reset search" data-bs-toggle="tooltip"
                            data-bs-placement="top">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-refresh">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                            </svg>
                            Reset
                        </a>
                        <a href="<?= route('admin.company') ?>" class="btn btn-warning d-sm-none btn-icon"
                            aria-label="Reset search keyword" title="Reset search" data-bs-toggle="tooltip"
                            data-bs-placement="top">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-refresh">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                            </svg>
                        </a>
                        <?php 
                        } ?>

                        <a href="<?= route('dashboard') ?>" class="btn btn-green d-none d-sm-inline-block"
                            aria-label="Import Excel" data-bs-toggle="modal" data-bs-target="#modal-import">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-file-import">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3" />
                            </svg>
                            Import Excel</a>
                        <a href="<?= route('dashboard') ?>" class="btn btn-green d-sm-none btn-icon"
                            aria-label="Import Excel" data-bs-toggle="modal" data-bs-target="#modal-import">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-file-import">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <?php
                    if (($keyword)) {
                    ?>
                        <div class="card-header">
                            <h4 class="card-title">Search results for the keyword
                                <strong>'{{ $keyword }}'</strong>
                            </h4>
                        </div>
                        <?php
                    } ?>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th class="w-1">#</th>
                                        <th>Name</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $index => $company)
                                        @php
                                            // Logika untuk menentukan alamat yang benar
                                            $alamat = $company->alamat_perseroan;
                                            $kabupaten = $company->kabupaten_nama_perseroan;
                                            $provinsi = $company->provinsi_nama_perseroan;
                                            $alamat_alternatif = $kabupaten ? $kabupaten . ', ' . $provinsi : $provinsi;

                                            $alamat_perseroan =
                                                $alamat && $alamat != 'Jl.' && $alamat != '-'
                                                    ? $alamat
                                                    : $alamat_alternatif;

                                            // Highlight keyword
                                            $highlightedName = $company->nama_perseroan;
                                            if ($keyword) {
                                                $highlightedName = preg_replace(
                                                    '/(' . preg_quote($keyword, '/') . ')/i',
                                                    '<span class="bg-yellow text-white">$1</span>',
                                                    $company->nama_perseroan,
                                                );
                                            }
                                        @endphp
                                        <tr>
                                            <td class="text-end">
                                                {{ number_format($index + $companies->firstItem(), 0, ',', '.') }}
                                            </td>
                                            <td>{!! $highlightedName !!}</td>
                                            <td>{!! nl2br(strtoupper(tambahkanSpasi($alamat_perseroan))) !!}</td>
                                            <td>{{ $company->nomor_sk }}</td>
                                            <td>
                                                <a href="{{ route('dashboard') }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if ($companies->isEmpty())
                                        <tr>
                                            <td colspan="5">Tidak ada data yang ditampilkan</td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>
                        </div>

                        @if ($companies->isNotEmpty())
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                {{ $companies->appends(['keyword' => request()->keyword])->links('pagination::bootstrap-5') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-import" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload file</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.company.import') }}" method="post">
                    <div class="modal-body">
                        <div class="col">
                            <label for="" class="form-label">File upload</label>
                            <input type="file" name="file_upload" id="file_upload" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
