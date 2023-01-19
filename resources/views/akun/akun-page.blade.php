@extends('layouts.user_type.auth')

@section('content')

<div>
 <!-- Modal -->
 <div class="modal fade" id="addAkunModal" tabindex="-1" role="dialog" aria-labelledby="addAkunLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="addAkunLabel">Tambah Akun
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('akun-store') }}" method="POST" role="form text-left">
                    @csrf
                    @if($errors->addAkun->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->addAkun->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_akun" class="form-control-label">{{ __('Nomer Akun') }}</label>
                                <div class="@error('no_akun','addAkun')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Nomer Akun" id="no_akun" @if($errors->addAkun->any()) value="{{ old('no_akun') }}" @endif name="no_akun">
                                        @error('no_akun','addAkun')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_akun" class="form-control-label">{{ __('Nama AKun') }}</label>
                                <div class="@error('nama_akun','addAkun')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Nama Akun" @if($errors->addAkun->any()) value="{{ old('nama_akun') }}" @endif id="nama_akun" name="nama_akun">
                                        @error('nama_akun','addAkun')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-12">
        @if(session('successTambahAkun'))
                <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                    <span class="alert-text text-white">
                    {{ session('successTambahAkun') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                </div>
            @endif
            @if(session('successUpdateAkun'))
                <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                    <span class="alert-text text-white">
                    {{ session('successUpdateAkun') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                </div>
            @endif
            @if(session('successDeleteAkun'))
                <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                    <span class="alert-text text-white">
                    {{ session('successDeleteAkun') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                </div>
            @endif
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
                        <span>
                            <button type="button" class="btn bg-gradient-dark btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addAkunModal">
                                +&nbsp; {{__('akun.add_akun')}}
                            </button></span>
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
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nomor Akun
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Akun
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi
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
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{ $no_akun->no_akun }}</p>
                                    </td>
                                    <td class="text-left">
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
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">{{ $data->no_akun }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">{{ $data->nama_akun }}</p>
                                        </td>
                                        <td class="text-left">
                                            <button type="button" class="btn p-0 m-0 btn-link" data-bs-toggle="modal" data-bs-target="#addUpdateModal{{ $data->id }}">
                                                <i class="fas fa-user-edit fa-lg text-secondary"></i>
                                            </button>
                                    </td>
                                    </tr>

                                    {{-- modal update --}}
                                <div class="modal fade" id="addUpdateModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="addUpdateModal{{ $data->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-normal" id="updateAkunLabel{{ $data->id }}">Update Akun No:{{ $data->no_akun }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('akun-update', ['akun' => $data->id]) }}" method="POST" role="form text-left">
                                                @method('put')
                                                @csrf
                                                @if($errors->updateAkun->any() && session('updateId')==$data->id)
                                                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                                        <span class="alert-text text-white">
                                                        {{$errors->updateAkun->first()}}</span>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fa fa-close" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="no_akun" class="form-control-label">{{ __('Nomer Akun') }}</label>
                                                            <div class="@if($errors->updateAkun->has('no_akun') && session('updateId')==$data->id)border border-danger rounded-3 @endif">
                                                                <input class="form-control" type="number" placeholder="Nomer Akun" id="no_akun" value="{{ $data->no_akun }}"  name="no_akun">
                                                                    @if($errors->updateAkun->has('no_akun') && session('updateId')==$data->id)
                                                                        <p class="text-danger text-xs mt-2">{{$errors->updateAkun->first('no_akun')}}</p>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama_akun" class="form-control-label">{{ __('Nama AKun') }}</label>
                                                            <div class="@if($errors->updateAkun->has('nama_akun') && session('updateId')==$data->id)border border-danger rounded-3 @endif">
                                                                <input class="form-control" type="text" placeholder="Nama Akun" value="{{ $data->nama_akun }}" id="nama_akun" name="nama_akun">
                                                                @if($errors->updateAkun->has('nama_akun') && session('updateId')==$data->id)
                                                                    <p class="text-danger text-xs mt-2">{{$errors->updateAkun->first('nama_akun')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                    
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

@if($errors->addAkun->any())
<script>
    $(document).ready(function(){
        $('#addAkunModal').modal('show');
    });
</script>
@endif

@if($errors->updateAkun->any())
<script>
    $(document).ready(function(){
        $('#addUpdateModal{{ session('updateId') }}').modal('show');
    });
</script>
@endif

@endsection