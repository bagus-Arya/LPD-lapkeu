@extends('layouts.user_type.auth')

@section('content')

<div>
  <!-- Modal -->
  <div class="modal fade" id="addBebanModal" tabindex="-1" role="dialog" aria-labelledby="addBebanLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title font-weight-normal" id="addBebanLabel">Tambah Beban</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="{{ route('beban-store') }}" method="POST" role="form text-left">
                  @csrf
                    @if($errors->addBeban->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->addBeban->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="no_akun_id">Role</label>
                            <div class="@error('no_akun_id','addBeban')border border-danger rounded-3 @enderror">
                            
                            <select class="form-control" id="no_akun_id" name="no_akun_id">
                                @foreach ($Akuns as $akun)
                                    <option value="{{ $akun->id }}" {{ old('no_akun_id')==$akun->id ? 'selected' : '' }}>{{ $akun->no_akun }} - {{ $akun->nama_akun }}</option>
                                @endforeach
                            </select>
                            </div>
                            @error('no_akun_id','addBeban')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="jumlah" class="form-control-label">{{ __('Jumlah') }}</label>
                              <div class="@error('jumlah','addBeban')border border-danger rounded-3 @enderror">
                                  <input class="form-control" type="text" placeholder="Masukan Jumlah" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
                                  @error('jumlah','addBeban')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="keterangan">{{ __('Keterangan') }}</label>
                            <div class="@error('keterangan','addBeban')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukan Keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan','addBeban')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                            <div class="@error('tgl_transaksi','addBeban')border border-danger rounded-3 @enderror">
                                <input id="datepicker" name="tgl_transaksi" class="form-control" value="{{ old('tgl_transaksi') }}" type="date" placeholder="Pilih Tanggal Transaksi" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                            @error('tgl_transaksi','addBeban')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="akun_types">Role</label>
                            <div class="@error('akun_types','addBeban')border border-danger rounded-3 @enderror">
                            <select class="form-control" id="addBeban" name="akun_types" readonly>
                                <!-- <option value="pengeluaran" @if($errors->addAkun->any()) {{ old('akun_types')=='pengeluaran' ? 'selected' : '' }} @endif>Pengeluaran</option> -->
                                <!-- <option value="penerimaan" selected>Pemasukan</option>-->
                                <option value="beban" selected>Beban</option>
                            </select>
                            </div>
                            @error('akun_types','addBeban')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                      @if (auth()->user()->user_type=='bendahara')
                      <div class="col-md-12">
                        <div class="@error('konfirmasi','addBeban')border border-danger rounded-3 @enderror">
                            <div class="form-check">
                                <input type="hidden" name="konfirmasi" value="0" />
                                <input class="form-check-input" type="checkbox" id="konfrimasi" name="konfirmasi" value="1" {{ old('konfirmasi')==1 ?  'checked="checked"' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault">
                                Konfirmasi Transaksi
                                </label>
                                @error('konfirmasi','addBeban')
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
        @if(session('successTambahBeban'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successTambahBeban') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
        @if(session('successUpdateBeban'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successUpdateBeban') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
        @if(session('successDeleteBeban'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successDeleteBeban') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
          <div class="card mb-4 mx-4">
              <div class="card-header pb-0">
                  <div class="d-flex flex-row justify-content-between">
                      <div>
                          <h5 class="mb-0">{{__('beban.all_beban')}}</h5>
                      </div>
                      <button type="button" class="btn bg-gradient-dark btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addBebanModal">
                          +&nbsp; {{__('beban.add_beban')}}
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
                                    Input Date
                                </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($Bebans as $beban)
                                
                            <!-- Modal -->
                                <div class="modal fade" id="updateBebanModal{{ $beban->id }}" tabindex="-1" role="dialog" aria-labelledby="updateBebanLabel{{ $beban->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-normal" id="updateBebanLabel{{ $beban->id }}">Update Beban</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('beban-update',['transaksi' => $beban->id]) }}" method="POST" role="form text-left">
                                                @csrf
                                                @method('put')
                                                @if($errors->updateBeban->any() && session('updateId')==$beban->id)
                                                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                                        <span class="alert-text text-white">
                                                        {{$errors->updateBeban->first()}}</span>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fa fa-close" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="no_akun_id">Role</label>
                                                            <div class="@if($errors->updateBeban->has('no_akun_id') && session('updateId')==$beban->id)border border-danger rounded-3 @endif">
                                                            
                                                            <select class="form-control" id="no_akun_id" name="no_akun_id">
                                                                @foreach ($Akuns as $akun)
                                                                    <option value="{{ $akun->id }}" {{ $akun->id==$beban->no_akun_id ? 'selected' : '' }}>{{ $akun->no_akun }} - {{ $akun->nama_akun }}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                            @if($errors->updateBeban->has('no_akun_id') && session('updateId')==$beban->id)
                                                                <p class="text-danger text-xs mt-2">{{$errors->updateBeban->first('no_akun_id')}}</p>
                                                                @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="jumlah" class="form-control-label">{{ __('Jumlah') }}</label>
                                                            <div class="@if($errors->updateBeban->has('jumlah') && session('updateId')==$beban->id)border border-danger rounded-3 @endif">
                                                                <input class="form-control" type="number" placeholder="Masukan Jumlah" id="jumlah" name="jumlah" value="{{ $beban->jumlah }}">
                                                                @if($errors->updateBeban->has('jumlah') && session('updateId')==$beban->id)
                                                                    <p class="text-danger text-xs mt-2">{{$errors->updateBeban->first('jumlah')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="keterangan">{{ __('Keterangan') }}</label>
                                                        <div class="@if($errors->updateBeban->has('keterangan') && session('updateId')==$beban->id)border border-danger rounded-3 @endif">
                                                            <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukan Keterangan" name="keterangan">{{ $beban->keterangan }}</textarea>
                                                            @if($errors->updateBeban->has('keterangan') && session('updateId')==$beban->id)
                                                                <p class="text-danger text-xs mt-2">{{$errors->updateBeban->first('keterangan')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                                                            <div class="@if($errors->updateBeban->has('tgl_transaksi') && session('updateId')==$beban->id)border border-danger rounded-3 @endif">
                                                                <input  name="tgl_transaksi" class="form-control datepickers" value="{{ \Carbon\Carbon::parse($beban->tgl_transaksi)->format('Y-m-d')}}" placeholder="Pilih Tanggal Transaksi" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                                                                @if($errors->updateBeban->has('tgl_transaksi') && session('updateId')==$beban->id)
                                                                    <p class="text-danger text-xs mt-2">{{$errors->updateBeban->first('tgl_transaksi')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="akun_types">Role</label>
                                                            <div class="@error('akun_types','addAkun')border border-danger rounded-3 @enderror">
                                                            <select class="form-control" id="akun_types" name="akun_types" readonly>
                                                                <!-- <option value="pengeluaran" @if($errors->addAkun->any()) {{ old('akun_types')=='pengeluaran' ? 'selected' : '' }} @endif>Pengeluaran</option> -->
                                                                {{-- <option value="penerimaan" @if($errors->addAkun->any()) {{ old('akun_types')=='penerimaan' ? 'selected' : ''  }} @endif>Pemasukan</option> --}}
                                                                <option value="beban" selected>Beban</option>
                                                            </select>
                                                            </div>
                                                            @if($errors->updatePenerimaan->has('akun_types') && session('updateId')==$pengeluaran->id)
                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    @if (auth()->user()->user_type=='bendahara')
                                                    <div class="col-md-12">
                                                        <div class="@if($errors->updateBeban->has('konfirmasi') && session('updateId')==$beban->id)border border-danger rounded-3 @endif">
                                                            <div class="form-check">
                                                                <input type="hidden" name="konfirmasi" value="0" />
                                                                <input class="form-check-input" type="checkbox" id="konfrimasi" name="konfirmasi" value="1" {{ $beban->konfirmasi==1 ?  'checked="checked"' : '' }}>
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                Konfirmasi Transaksi
                                                                </label>
                                                                @if($errors->updateBeban->has('keterangan') && session('updateId')==$beban->id)
                                                                    <p class="text-danger text-xs mt-2">{{$errors->updateBeban->first('konfirmasi')}}</p>
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
                                      <p class="text-xs font-weight-bold mb-0">{{ $beban->akun->no_akun }} - {{ $beban->akun->nama_akun }}</p>
                                  </td>
                                  <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $beban->jumlah }} </p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $beban->keterangan }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0 {{ $beban->konfirmasi==1 ? 'text-success': 'text-danger' }}">{{ $beban->konfirmasi==1 ? 'Accepted': 'Not Accepted' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($beban->created_at)->format('d M Y')}}</p>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn p-0 m-0 btn-link" data-bs-toggle="modal" data-bs-target="#updateBebanModal{{ $beban->id }}">
                                        <i class="fas fa-user-edit fa-lg text-secondary"></i>
                                    </button>
                                    <span>
                                        <form style="display: inline" action="{{ route('beban-destroy',['transaksi' => $beban->id]) }}" method="POST">
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
@if($errors->addBeban->any())
<script>
    $(document).ready(function(){
        $('#addBebanModal').modal('show');
    });
</script>
@endif

@if($errors->updateBeban->any())
<script>
    $(document).ready(function(){
        $('#updateBebanModal{{ session('updateId') }}').modal('show');
    });
</script>
@endif
@endsection