@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">   
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{__('akun.all_akun')}} ({{ $AkunCari->total() }})</h5>
                        </div>
                        <form action="{{ route('akun') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control" type="text" name="cari" placeholder="Cari Akun" value="{{ old('cari') }}">
                                    <input class="btn bg-gradient-dark btn-sm mb-0" type="submit" value="CARI">
                                </div>
                            </div>
	                    </form>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nomor Akun
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Akun
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $datas = $AkunCari->count();
                            @endphp
                            @if( $datas < 1)
                                @foreach ($allno_akun as $no_akun)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $no_akun->id }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $no_akun->no_akun }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $no_akun->nama_akun }}</p>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                @foreach($AkunCari as $data)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $data->id }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $data->no_akun }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $data->nama_akun }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                                    <!-- <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">Halaman : {{ $AkunCari->currentPage() }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Jumlah Data : {{ $AkunCari->total() }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Data Per Halaman : {{ $AkunCari->perPage() }}</p>
                                        </td>
                                    </tr> -->
                            @endif
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center mt-3">
                            {{ $AkunCari->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection