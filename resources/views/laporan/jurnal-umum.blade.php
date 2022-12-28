@extends('layouts.user_type.auth')

@section('content')

<div>
  <!-- Modal Store -->
  <div class="modal fade" id="addJurnalModal" tabindex="-1" role="dialog" aria-labelledby="addJurnalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title font-weight-normal" id="addJurnalLabel">Tambah Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="{{ route('jurnal-store.umum') }}" method="POST" role="form text-left">
                  @csrf
                    @if($errors->addJurnal->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->addJurnal->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="no_akun_id">Akun</label>
                            <div class="@error('no_akun_id','addJurnal')border border-danger rounded-3 @enderror">
                            
                            <select class="form-control" id="no_akun_id" name="no_akun_id">
                                @foreach ($Akuns as $akun)
                                    <option value="{{ $akun->id }}" {{ old('no_akun_id')==$akun->id ? 'selected' : '' }}>{{ $akun->no_akun }} - {{ $akun->nama_akun }}</option>
                                @endforeach
                            </select>
                            </div>
                            @error('no_akun_id','addJurnal')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                      </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jumlah" class="form-control-label">{{ __('Jumlah') }}</label>
                                <div class="@error('jumlah','addJurnal')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Masukan Jumlah" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
                                        @error('jumlah','addJurnal')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_transaksi">Tanggal Transaksi</label>
                                <div class="@error('tgl_transaksi','addJurnal')border border-danger rounded-3 @enderror">
                                    <input id="datepicker" name="tgl_transaksi" class="form-control" value="{{ old('tgl_transaksi') }}" type="date" placeholder="Pilih Tanggal Transaksi" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                                @error('tgl_transaksi','addJurnal')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="types">Tipe</label>
                                <div class="@error('types','addJurnal')border border-danger rounded-3 @enderror">
                                <select class="form-control" id="addJurnal" name="types">
                                    <option value="debet" @if($errors->addAkun->any()) {{ old('types')=='debet' ? 'selected' : '' }} @endif>Debet</option>
                                    <option value="kredit" @if($errors->addAkun->any()) {{ old('types')=='kredit' ? 'selected' : ''  }} @endif>Kredit</option>                 
                                </select>
                                </div>
                                @error('types','addJurnal')
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
        @if(session('successTambahjurnal'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successTambahjurnal') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
        @if(session('successUpdatepenerimaan'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successUpdatepenerimaan') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
        @if(session('successDeletepenerimaan'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successDeletepenerimaan') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
        <!-- List Data -->
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="mb-0">{{__('common.laporan_jurnal_umum')}}</h5>
                    </div>
                    <button type="button" class="btn bg-gradient-dark btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addJurnalModal">
                        +&nbsp; {{__('common.tambah_laporan_jurnal_umum')}}
                    </button>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Akun
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Debet
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Kredit
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($ListJurnalUmum as $data)
                            
                        <!-- Modal Update -->
                            <div class="modal fade" id="updateJurnalModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="updateJurnalLabel{{ $data->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-normal" id="updateJurnalLabel{{ $data->id }}">Update Data Jurnal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('jurnal-update.umum',['transaksi' => $data->id]) }}" method="POST" role="form text-left">
                                            @csrf
                                            @method('put')
                                            @if($errors->updateJurnalUmum->any() && session('updateId')==$data->id)
                                                <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                                    <span class="alert-text text-white">
                                                    {{$errors->updateJurnalUmum->first()}}</span>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                        <i class="fa fa-close" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="no_akun_id">Akun</label>
                                                        <div class="@if($errors->updateJurnalUmum->has('no_akun_id') && session('updateId')==$data->id)border border-danger rounded-3 @endif">
                                                        
                                                        <select class="form-control" id="no_akun_id" name="no_akun_id">
                                                            @foreach ($Akuns as $akun)
                                                                <option value="{{ $akun->id }}" {{ $akun->id==$data->no_akun_id ? 'selected' : '' }}>{{ $akun->no_akun }} - {{ $akun->nama_akun }}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                        @if($errors->updateJurnalUmum->has('no_akun_id') && session('updateId')==$data->id)
                                                            <p class="text-danger text-xs mt-2">{{$errors->updateJurnalUmum->first('no_akun_id')}}</p>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="jumlah" class="form-control-label">{{ __('Jumlah') }}</label>
                                                        <div class="@if($errors->updateJurnalUmum->has('jumlah') && session('updateId')==$data->id)border border-danger rounded-3 @endif">
                                                            <input class="form-control" type="number" placeholder="Masukan Jumlah" id="jumlah" name="jumlah" value="{{ $data->jumlah }}">
                                                            @if($errors->updateJurnalUmum->has('jumlah') && session('updateId')==$data->id)
                                                                <p class="text-danger text-xs mt-2">{{$errors->updateJurnalUmum->first('jumlah')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tgl_transaksi">Tanggal Transaksi</label>
                                                        <div class="@if($errors->updateJurnalUmum->has('tgl_transaksi') && session('updateId')==$data->id)border border-danger rounded-3 @endif">
                                                            <input  name="tgl_transaksi" class="form-control datepickers" value="{{ \Carbon\Carbon::parse($data->tgl_transaksi)->format('Y-m-d')}}" placeholder="Pilih Tanggal Transaksi" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                                                            @if($errors->updateJurnalUmum->has('tgl_transaksi') && session('updateId')==$data->id)
                                                                <p class="text-danger text-xs mt-2">{{$errors->updateJurnalUmum->first('tgl_transaksi')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="types">Tipe</label>
                                                        <div class="@error('types','addAkun')border border-danger rounded-3 @enderror">
                                                        <select class="form-control" id="types" name="types">
                                                            <option value="debet" @if($errors->addAkun->any()) {{ old('types') == 'debet' ? 'selected' : '' }} @endif>Debet</option>
                                                            <option value="kredit" @if($errors->addAkun->any()) {{ old('types') == 'kredit' ? 'selected' : ''  }} @endif>Kredit</option>
                                                        </select>
                                                        </div>
                                                        @if($errors->updateJurnalUmum->has('types') && session('updateId')==$data->id)
                                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                        @enderror
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
                            </div>    

                            <tr>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($data->tgl_transaksi)->format('d M Y')}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->akun->no_akun }} - {{ $data->akun->nama_akun }}</p>
                                </td>

                                @if($data->types == 'debet')
                                    <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Rp. {{ number_format($data->jumlah, 0, ',', '.') ? number_format($data->jumlah, 0, ',', '.') : ' - ' }}</p>

                                    </td>
                                @else
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">-</p>
                                    </td>
                                @endif

                                @if($data->types == 'kredit')
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Rp. {{ number_format($data->jumlah, 0, ',', '.') ? number_format($data->jumlah, 0, ',', '.') : ' - ' }}</p>
                                    </td>
                                @else
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">-</p>
                                    </td>
                                @endif
                                <td class="text-center">
                                    <button type="button" class="btn p-0 m-0 btn-link" data-bs-toggle="modal" data-bs-target="#updateJurnalModal{{ $data->id }}">
                                        <i class="fas fa-user-edit fa-lg text-secondary"></i>
                                    </button>
                                    <span>
                                        <form style="display: inline" action="{{ route('penerimaan-destroy.kas',['transaksi' => $data->id]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn p-0 m-0 btn-link"><i class="cursor-pointer fas fa-trash fa-lg text-secondary"></i></button>
                                        </form> 
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
      </div>
  </div>
</div>

@if($errors->addPenerimaan->any())
<script>
    $(document).ready(function(){
        $('#addJurnalModal').modal('show');
    });
</script>
@endif

{{-- <script>
    $(document).ready(function() {
        const flatpickr_time = $('#datepicker').flatpickr({
            //static: position the calendar inside the wrapper and next to the input element*.
            static: true
        });
        // const flatpickr_time2 = $('.datepickers').flatpickr({
        //     //static: position the calendar inside the wrapper and next to the input element*.
        //     static: true
        // });
    });
</script> --}}



@if($errors->updateJurnalUmum->any())
<script>
    $(document).ready(function(){
        $('#updateJurnalModal{{ session('updateId') }}').modal('show');
    });
</script>
@endif

@endsection