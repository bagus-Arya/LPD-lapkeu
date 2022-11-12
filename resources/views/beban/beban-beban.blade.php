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
                                    <option value="{{ $akun->id }}">{{ $akun->no_akun }} - {{ $akun->nama_akun }}</option>
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
                                  <input class="form-control" type="text" placeholder="Masukan Jumlah" id="jumlah" name="jumlah">
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
                                <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukan Keterangan" name="keterangan"></textarea>
                                @error('keterangan','addBeban')
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