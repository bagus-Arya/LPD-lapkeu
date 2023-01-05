@extends('layouts.user_type.auth')

@section('content')

<div>
  <!-- Modal -->
  <div class="modal fade" id="addPengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="addPengeluaranLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title font-weight-normal" id="addPengeluaranLabel">Tambah Pengeluaran</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="{{ route('pengeluaran-store.kas') }}" method="POST" role="form text-left">
                  @csrf
                    @if($errors->addPengeluaran->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->addPengeluaran->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="no_akun_id">Role</label>
                            <div class="@error('no_akun_id','addPengeluaran')border border-danger rounded-3 @enderror">
                            
                            <select class="form-control" id="no_akun_id" name="no_akun_id">
                                @foreach ($Akuns as $akun)
                                    <option value="{{ $akun->id }}" {{ old('no_akun_id')==$akun->id ? 'selected' : '' }}>{{ $akun->no_akun }} - {{ $akun->nama_akun }}</option>
                                @endforeach
                            </select>
                            </div>
                            @error('no_akun_id','addPengeluaran')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="jumlah" class="form-control-label">{{ __('Jumlah') }}</label>
                              <div class="@error('jumlah','addPengeluaran')border border-danger rounded-3 @enderror">
                                  <input class="form-control" type="text" placeholder="Masukan Jumlah" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
                                  @error('jumlah','addPengeluaran')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="keterangan">{{ __('Keterangan') }}</label>
                            <div class="@error('keterangan','addPengeluaran')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukan Keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan','addPengeluaran')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                            <div class="@error('tgl_transaksi','addPengeluaran')border border-danger rounded-3 @enderror">
                                <input id="datepicker" name="tgl_transaksi" class="form-control" value="{{ old('tgl_transaksi') }}" type="date" placeholder="Pilih Tanggal Transaksi" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                            @error('tgl_transaksi','addPengeluaran')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="akun_types">Role</label>
                            <div class="@error('akun_types','addPengeluaran')border border-danger rounded-3 @enderror">
                            <select class="form-control" id="addPengeluaran" name="akun_types">
                                <option value="pengeluaran" @if($errors->addAkun->any()) {{ old('akun_types')=='pengeluaran' ? 'selected' : '' }} @endif>Pengeluaran</option>
                                <!-- <option value="penerimaan" @if($errors->addAkun->any()) {{ old('akun_types')=='penerimaan' ? 'selected' : ''  }} @endif>Pemasukan</option> -->
                                <!-- <option value="beban" @if($errors->addAkun->any()) {{ old('akun_types')=='beban' ? 'selected' : ''  }} @endif>Beban</option> -->
                            </select>
                            </div>
                            @error('akun_types','addPengeluaran')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                      @if (auth()->user()->user_type=='bendahara')
                      <div class="col-md-12">
                        <div class="@error('konfirmasi','addPengeluaran')border border-danger rounded-3 @enderror">
                            <div class="form-check">
                                <input type="hidden" name="konfirmasi" value="0" />
                                <input class="form-check-input" type="checkbox" id="konfrimasi" name="konfirmasi" value="1" {{ old('konfirmasi')==1 ?  'checked="checked"' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault">
                                Konfirmasi Transaksi
                                </label>
                                @error('konfirmasi','addPengeluaran')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endif

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
        @if(session('successTambahPengeluaran'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successTambahPengeluaran') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
        @if(session('successUpdatePengeluaran'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successUpdatePengeluaran') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
        @if(session('successDeletePengeluaran'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successDeletePengeluaran') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
          <div class="card mb-4 mx-4">
              <div class="card-header pb-0">
                  <div class="d-flex flex-row justify-content-between">
                      <div>
                          <h5 class="mb-0">{{__('pengeluaran.all_pengeluaran')}}</h5>
                      </div>
                      <button type="button" class="btn bg-gradient-dark btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addPengeluaranModal">
                          +&nbsp; {{__('pengeluaran.add_pengeluaran')}}
                      </button>
                  </div>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                          <thead>
                              <tr>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Nomor Akun
                                  </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah
                                        </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Keterangan
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal Transaksi
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal Input
                                </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($Pengeluarans as $pengeluaran)
                                
                            <!-- Modal -->
                                <div class="modal fade" id="updatePengeluaranModal{{ $pengeluaran->id }}" tabindex="-1" role="dialog" aria-labelledby="updatePengeluaranLabel{{ $pengeluaran->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-normal" id="updatePengeluaranLabel{{ $pengeluaran->id }}">Update Pengeluaran Kas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pengeluaran-update.kas',['transaksi' => $pengeluaran->id]) }}" method="POST" role="form text-left">
                                                @csrf
                                                @method('put')
                                                @if($errors->updatePengeluaran->any() && session('updateId')==$pengeluaran->id)
                                                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                                        <span class="alert-text text-white">
                                                        {{$errors->updatePengeluaran->first()}}</span>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fa fa-close" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="no_akun_id">Role</label>
                                                            <div class="@if($errors->updatePengeluaran->has('no_akun_id') && session('updateId')==$pengeluaran->id)border border-danger rounded-3 @endif">
                                                            
                                                            <select class="form-control" id="no_akun_id" name="no_akun_id">
                                                                @foreach ($Akuns as $akun)
                                                                    <option value="{{ $akun->id }}" {{ $akun->id==$pengeluaran->no_akun_id ? 'selected' : '' }}>{{ $akun->no_akun }} - {{ $akun->nama_akun }}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                            @if($errors->updatePengeluaran->has('no_akun_id') && session('updateId')==$pengeluaran->id)
                                                                <p class="text-danger text-xs mt-2">{{$errors->updatePengeluaran->first('no_akun_id')}}</p>
                                                                @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="jumlah" class="form-control-label">{{ __('Jumlah') }}</label>
                                                            <div class="@if($errors->updatePengeluaran->has('jumlah') && session('updateId')==$pengeluaran->id)border border-danger rounded-3 @endif">
                                                                <input class="form-control" type="number" placeholder="Masukan Jumlah" id="jumlah" name="jumlah" value="{{ $pengeluaran->jumlah }}">
                                                                @if($errors->updatePengeluaran->has('jumlah') && session('updateId')==$pengeluaran->id)
                                                                    <p class="text-danger text-xs mt-2">{{$errors->updatePengeluaran->first('jumlah')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="keterangan">{{ __('Keterangan') }}</label>
                                                        <div class="@if($errors->updatePengeluaran->has('keterangan') && session('updateId')==$pengeluaran->id)border border-danger rounded-3 @endif">
                                                            <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukan Keterangan" name="keterangan">{{ $pengeluaran->keterangan }}</textarea>
                                                            @if($errors->updatePengeluaran->has('keterangan') && session('updateId')==$pengeluaran->id)
                                                                <p class="text-danger text-xs mt-2">{{$errors->updatePengeluaran->first('keterangan')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tgl_transaksi">Tanggal Transaksi </label>
                                                            <div class="@if($errors->updatePengeluaran->has('tgl_transaksi') && session('updateId')==$pengeluaran->id)border border-danger rounded-3 @endif">
                                                                <input  name="tgl_transaksi" class="form-control datepickers" value="{{ \Carbon\Carbon::parse($pengeluaran->tgl_transaksi)->format('Y-m-d')}}" placeholder="Pilih Tanggal Transaksi" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                                                                @if($errors->updatePengeluaran->has('tgl_transaksi') && session('updateId')==$pengeluaran->id)
                                                                    <p class="text-danger text-xs mt-2">{{$errors->updatePengeluaran->first('tgl_transaksi')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="akun_types">Role</label>
                                                            <div class="@error('akun_types','addAkun')border border-danger rounded-3 @enderror">
                                                            <select class="form-control" id="akun_types" name="akun_types" readonly>
                                                                 <option value="pengeluaran" @if($errors->addAkun->any()) {{ old('akun_types')=='pengeluaran' ? 'selected' : '' }} @endif>Pengeluaran</option>
                                                                <!--<option value="penerimaan" @if($errors->addAkun->any()) {{ old('akun_types')=='penerimaan' ? 'selected' : ''  }} @endif>Pemasukan</option> -->
                                                                <!-- <option value="beban" @if($errors->addAkun->any()) {{ old('akun_types')=='beban' ? 'selected' : ''  }} @endif>Beban</option> -->
                                                            </select>
                                                            </div>
                                                            @if($errors->updatePenerimaan->has('akun_types') && session('updateId')==$pengeluaran->id)
                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    @if (auth()->user()->user_type=='bendahara')
                                                    <div class="col-md-12">
                                                        <div class="@if($errors->updatePengeluaran->has('konfirmasi') && session('updateId')==$pengeluaran->id)border border-danger rounded-3 @endif">
                                                            <div class="form-check">
                                                                <input type="hidden" name="konfirmasi" value="0" />
                                                                <input class="form-check-input" type="checkbox" id="konfrimasi" name="konfirmasi" value="1" {{ $pengeluaran->konfirmasi==1 ?  'checked="checked"' : '' }}>
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                Konfirmasi Transaksi
                                                                </label>
                                                                @if($errors->updatePengeluaran->has('keterangan') && session('updateId')==$pengeluaran->id)
                                                                    <p class="text-danger text-xs mt-2">{{$errors->updatePengeluaran->first('konfirmasi')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
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

                              <tr>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">{{ $pengeluaran->akun->no_akun }} - {{ $pengeluaran->akun->nama_akun }}</p>
                                  </td>
                                  <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Rp. {{ number_format($pengeluaran->jumlah, 0, ',', '.') ? number_format($pengeluaran->jumlah, 0, ',', '.') : ' - ' }} </p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengeluaran->keterangan }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0 {{ $pengeluaran->konfirmasi==1 ? 'text-success': 'text-danger' }}">{{ $pengeluaran->konfirmasi==1 ? 'Accepted': 'Not Accepted' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($pengeluaran->tgl_transaksi)->format('d M Y')}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($pengeluaran->created_at)->format('d M Y')}}</p>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn p-0 m-0 btn-link" data-bs-toggle="modal" data-bs-target="#updatePengeluaranModal{{ $pengeluaran->id }}">
                                        <i class="fas fa-user-edit fa-lg text-secondary"></i>
                                    </button>
                                    <span>
                                        <form style="display: inline" action="{{ route('pengeluaran-destroy.kas',['transaksi' => $pengeluaran->id]) }}" method="POST">
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
@if($errors->addPengeluaran->any())
<script>
    $(document).ready(function(){
        $('#addPengeluaranModal').modal('show');
    });
</script>
@endif

@if($errors->updatePengeluaran->any())
<script>
    $(document).ready(function(){
        $('#updatePengeluaranModal{{ session('updateId') }}').modal('show');
    });
</script>
@endif
  
@endsection