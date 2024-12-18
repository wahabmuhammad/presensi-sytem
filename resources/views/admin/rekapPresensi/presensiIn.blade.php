@extends('admin.layout.masterlayout')
@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="container-xl">

                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Administrator
                        </div>
                        <h2 class="page-title">
                            Rekap Presensi Masuk
                        </h2>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Total Presensi Masuk</div>
                                </div>
                                <div class="h1 mb-3">{{ $jumlahMasuk }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Total Keterlambatan</div>
                                </div>
                                <div class="h1 mb-3">{{ $totalTerlambat }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- Page title actions -->
                </div>
            </div>
        </div>
        <div class="col-12", style="margin-top: 30px">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-tittle">Daftar User</h3>
                    <div class="col-auto ms-auto">
                        <a href="{{ 'rekap_Presensi_in/export/excel' }}" class="btn btn-cyan">Export ke Excel</a>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <form action="{{ url('rekap_Presensi_in') }}" method="GET">
                        <div class="row d-flex">
                            {{-- <div class="col ms-auto text-secondary">
                                Show
                                <div class="mx-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm" name="show" id="show"
                                        value="{{ Request::get('show') }}" size="3" aria-label="Invoices count">
                                </div>
                                entries
                            </div> --}}
                            <div class="col ms-auto text-secondary">
                                <label class="form-label" for="date_start">Tanggal Awal</label>
                                <div class="input-group">
                                    <input type="date" value="{{ Request::get('date_start') }}" class="form-control"
                                        placeholder="{{ $today }}" name="date_start" aria-label="Search in website">
                                    <span class="input-group-text" id="basic-addon1">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calendar-filled" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M16 2a1 1 0 0 1 .993 .883l.007 .117v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 1.993 -.117l.007 .117v1h6v-1a1 1 0 0 1 1 -1zm3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16v-9.625z"
                                                stroke-width="0" fill="currentColor"></path>
                                            <path
                                                d="M12 12a1 1 0 0 1 .993 .883l.007 .117v3a1 1 0 0 1 -1.993 .117l-.007 -.117v-2a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"
                                                stroke-width="0" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="col ms-auto text-secondary">
                                <label class="form-label" for="date_to">Tanggal Akhir</label>
                                <div class="input-group">
                                    <input type="date" value="{{ Request::get('date_to') }}" class="form-control"
                                        placeholder="{{ $today }}" name="date_to" aria-label="Search in website">
                                    <span class="input-group-text" id="basic-addon1">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calendar-filled" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M16 2a1 1 0 0 1 .993 .883l.007 .117v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 1.993 -.117l.007 .117v1h6v-1a1 1 0 0 1 1 -1zm3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16v-9.625z"
                                                stroke-width="0" fill="currentColor"></path>
                                            <path
                                                d="M12 12a1 1 0 0 1 .993 .883l.007 .117v3a1 1 0 0 1 -1.993 .117l-.007 -.117v-2a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"
                                                stroke-width="0" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="col ms-auto text-secondary">
                                <label class="form-label" for="search">Search</label>
                                <div class="input-group">
                                    <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                        placeholder="Search…" name="search" aria-label="Search in website">
                                    <button class="btn btn-primary" type="submit">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                            <path d="M21 21l-6 -6" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Shift</th>
                                <th>Foto Masuk</th>
                                <th>Tanggal Masuk</th>
                                <th>Jam Masuk</th>
                                <th>Foto Pulang</th>
                                <th>Tanggal Pulang</th>
                                <th>Jam Pulang</th>
                                <th>Keterlambatan</th>
                                <th>Total Jam Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = $rekapMasuk->firstItem();
                            @endphp
                            @foreach ($rekapMasuk as $u)
                                @php
                                    $pathIn = Storage::url('public/upload/presensi-masuk/' . $u->foto_in);
                                    $pathOut = Storage::url('public/upload/presensi-pulang/' . $u->foto_out);
                                @endphp
                                <tr>
                                    <td class="text-secondary strong" data-label="NO">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-secondary strong" data-label="NIP">
                                        {{ $u->nip }}
                                    </td>
                                    <td data-label="Name">
                                        <div class="d-flex py-1 align-items-center">
                                            <div class="flex-fill">
                                                <div class="font-weight-medium strong">{{ $u->name }}</div>
                                                {{-- <div class="text-secondary"><a href="#"
                                                        class="text-reset">{{ $u->location_in }}</a></div> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-secondary strong" data-label="Shift">
                                        {{ $u->shift }}
                                    </td>
                                    <td class="text-secondary strong" data-label="Foto Masuk">
                                        <div class="icon-box">
                                            <img src="{{ url($pathIn) }}" alt="image" height="42" width="62"
                                                class="imaged rounded center">
                                        </div>
                                    </td>
                                    </td>
                                    <td data-label="Tanggal Masuk">
                                        <div class="strong">{{ $u->tgl_presensi }}</div>
                                        {{-- <div class="text-secondary">{{ $u->jam_in }}</div> --}}
                                    </td>
                                    <td data-label="Jam Masuk">
                                        <div class="strong">{{ $u->jam_in }}</div>
                                    </td>
                                    <td class="text-secondary strong" data-label="Foto Masuk">
                                        <div class="icon-box">
                                            <img src="{{ url($pathOut) }}" alt="image" height="42" width="62"
                                                class="imaged rounded center">
                                        </div>
                                    <td data-label="Tanggal Pulang">
                                        <div class="strong">{{ $u->tgl_presensi_out }}</div>
                                        {{-- <div class="text-secondary">{{ $u->jam_in }}</div> --}}
                                    </td>
                                    <td data-label="Jam Pulang">
                                        <div class="strong">{{ $u->jam_out }}</div>
                                        {{-- <div class="text-secondary">{{ $u->jam_in }}</div> --}}
                                    </td>
                                    <td data-label="Keterlambatan">
                                        <div class="strong">{{ $u->jam_terlambat }}</div>
                                        {{-- <div class="text-secondary">{{ $u->jam_in }}</div> --}}
                                    </td>
                                    <td data-label="Total Jam Kerja">
                                        <div class="strong">{{ $u->total_jamkerja }}</div>
                                        {{-- <div class="text-secondary">{{ $u->jam_in }}</div> --}}
                                    </td>
                                    {{-- <td>
                                        <div class="btn-list flex-nowrap">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td> --}}
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    {{ $rekapMasuk->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
