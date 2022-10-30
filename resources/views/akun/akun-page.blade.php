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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="akun_types">Role</label>
                                <select class="form-control" id="akun_types" name="akun_types">
                                    <option value="pengeluaran" @if($errors->addAkun->any()) {{ old('akun_types')=='pengeluaran' ? 'selected' : '' }} @endif>Pengeluaran</option>
                                    <option value="pemasukan" @if($errors->addAkun->any()) {{ old('akun_types')=='pemasukan' ? 'selected' : ''  }} @endif>Pemasukan</option>
                                    <option value="beban" @if($errors->addAkun->any()) {{ old('akun_types')=='beban' ? 'selected' : ''  }} @endif>beban</option>
                                </select>
                                @error('akun_types','addAkun')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
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
                            <h5 class="mb-0">{{__('akun.all_akun')}}</h5>
                        </div>
                        <button type="button" class="btn bg-gradient-dark btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addAkunModal">
                            +&nbsp; {{__('akun.add_akun')}}
                        </button>
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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tipe Akun
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $no_akun->akun_types }}</p>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn p-0 m-0 btn-link" data-bs-toggle="modal" data-bs-target="#addUpdateModal{{ $no_akun->id }}">
                                            <i class="fas fa-user-edit fa-lg text-secondary"></i>
                                        </button>
                                        <span>
                                            <form style="display: inline" action="{{ route('akun-delete', ['akun' => $no_akun->id]) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn p-0 m-0 btn-link"><i class="cursor-pointer fas fa-trash fa-lg text-secondary"></i></button>
                                            </form> 
                                        </span>
                                    </td>
                                </tr>

                                {{-- modal update --}}
                                <div class="modal fade" id="addUpdateModal{{ $no_akun->id }}" tabindex="-1" role="dialog" aria-labelledby="addUpdateModal{{ $no_akun->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-normal" id="updateAkunLabel{{ $no_akun->id }}">Update Akun No:{{ $no_akun->no_akun }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('akun-update', ['akun' => $no_akun->id]) }}" method="POST" role="form text-left">
                                                @method('put')
                                                @csrf
                                                @if($errors->updateAkun->any() && session('updateId')==$no_akun->id)
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
                                                            <div class="@if($errors->updateAkun->has('no_akun') && session('updateId')==$no_akun->id)border border-danger rounded-3 @endif">
                                                                <input class="form-control" type="number" placeholder="Nomer Akun" id="no_akun" value="{{ $no_akun->no_akun }}"  name="no_akun">
                                                                    @if($errors->updateAkun->has('no_akun') && session('updateId')==$no_akun->id)
                                                                        <p class="text-danger text-xs mt-2">{{$errors->updateAkun->first('no_akun')}}</p>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama_akun" class="form-control-label">{{ __('Nama AKun') }}</label>
                                                            <div class="@if($errors->updateAkun->has('nama_akun') && session('updateId')==$no_akun->id)border border-danger rounded-3 @endif">
                                                                <input class="form-control" type="text" placeholder="Nama Akun" value="{{ $no_akun->nama_akun }}" id="nama_akun" name="nama_akun">
                                                                @if($errors->updateAkun->has('nama_akun') && session('updateId')==$no_akun->id)
                                                                    <p class="text-danger text-xs mt-2">{{$errors->updateAkun->first('nama_akun')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="akun_types">Role</label>
                                                            <select class="form-control" id="akun_types" name="akun_types">
                                                                <option value="pengeluaran" {{ $no_akun->akun_types=='pengeluaran' ? 'selected' : '' }} >Pengeluaran</option>
                                                                <option value="pemasukan" {{ $no_akun->akun_types=='pemasukan' ? 'selected' : ''  }} >Pemasukan</option>
                                                                <option value="beban" {{ $no_akun->akun_types=='beban' ? 'selected' : ''  }} >beban</option>
                                                            </select>
                                                            @if($errors->updateAkun->has('akun_types') && session('updateId')==$no_akun->id)
                                                                <p class="text-danger text-xs mt-2">{{$errors->updateAkun->first('akun_types')}}</p>
                                                            @endif
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
                            </tbody>
                        </table>
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