@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
      <!-- Set tanggal saldo awal -->
      <div class="col-6">
          @if(session('successSetTanggal'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successSetTanggal') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
          @endif
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex flex-row justify-content-between">
                <div>
                  <h5 class="mb-0"> Tanggal Transaksi Saldo Awal</h5>
                </div>
              </div>
            </div>
            <div class="card-body pt-2">
              <form action="{{ route('set.tanggal') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="tgl_start">Start</label>
                  <div class="border border-info rounded-3">
                      <input name="start" class="form-control datepickers" placeholder="Pilih Tanggal Transaksi" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="tgl_end">End</label>
                  <div class="border border-info rounded-3">
                      <input name="end" class="form-control datepickers" placeholder="Pilih Tanggal Transaksi" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="d-flex justify-content-end mb-4">
                  <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                </div>
              </form>
              <div>
              @foreach ($daterange as $dateset)
                <a href=""><b>Periode : </b></a>
                <a href="">{{ \Carbon\Carbon::parse($dateset->start)->format('d/m/Y')}}</a>
                <a href=""> - {{ \Carbon\Carbon::parse($dateset->end)->format('d/m/Y')}}</a>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      <!-- Set tanggal mutasi -->
      <div class="col-6">
          @if(session('successSetTanggalMutasi'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('successSetTanggalMutasi') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
          @endif
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex flex-row justify-content-between">
                <div>
                  <h5 class="mb-0"> Tanggal Transaksi Mutasi</h5>
                </div>
              </div>
            </div>
            <div class="card-body pt-2">
              <form action="{{ route('tanggal.mutasi') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="tgl_start">Start</label>
                  <div class="border border-info rounded-3">
                      <input name="start_mutasi" class="form-control datepickers" placeholder="Pilih Tanggal Transaksi" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="tgl_end">End</label>
                  <div class="border border-info rounded-3">
                      <input name="end_mutasi" class="form-control datepickers" placeholder="Pilih Tanggal Transaksi" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="d-flex justify-content-end mb-4">
                  <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                </div>
              </form>
              <div>
              @foreach ($daterange as $dateset)
                <a href=""><b>Periode : </b></a>
                <a href="">{{ \Carbon\Carbon::parse($dateset->start_mutasi)->format('d/m/Y')}}</a>
                <a href=""> - {{ \Carbon\Carbon::parse($dateset->end_mutasi)->format('d/m/Y')}}</a>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bagian laporan -->
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">Neraca Percobaan</h5>
                </div>
                <a href="{{route('show.pdf')}}" type="button" class="btn bg-gradient-dark btn-sm mb-0"> +&nbsp;Cetak Laporan</a>
              </div>
            </div>
            <div class="card-body pt-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" cellpadding="10px">
                  <thead>
                      <tr>
                        <th rowspan="3" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Perkiraan</th>
                      </tr>
                      <tr>
                        <th colspan="2" class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Saldo Awal</th>
                        <th colspan="2" class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Mutasi</th>
                        <th colspan="2" class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Saldo Akhir</th>
                      </tr>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Debet</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Kredit</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Debet</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Kredit</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Debet</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Kredit</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Kas</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumKasAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiKasDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiKasKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah(($SumKasAWDebet + $MutasiKasDebet - $MutasiKasKredit)) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Bank BPD</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Giro</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBPDGiroAWDebet) }}  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBPDGiroDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBPDGiroAWDebet + $MutasiBPDGiroDebet) }}  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Tabungan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($SumBPDTabunganAWDebet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBPDTabunganDebet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBPDTabunganAWDebet+$MutasiBPDTabunganDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Deposito</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($BPD_Deposito_AW_Debet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBPDDepositoDebet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBPDDepositoKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($BPD_Deposito_AW_Debet + $MutasiBPDDepositoDebet - $MutasiBPDDepositoKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Bank Lembaga Lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Giro</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBankLainGiroAWDebet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBankLainGiroDebet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBankLainGiroKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBankLainGiroAWDebet+$MutasiBankLainGiroDebet-$MutasiBankLainGiroKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Tabungan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBankLainTabunganAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBankLainTabunganDebet ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBankLainTabunganKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBankLainTabunganAWDebet+$MutasiBankLainTabunganDebet-$MutasiBankLainTabunganKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Deposito</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBankLainDepositoAWDebet  ) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBankLainDepositoDebet ) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBankLainDepositoKredit ) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBankLainDepositoAWDebet+$MutasiBankLainDepositoDebet-$MutasiBankLainDepositoKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Pinjaman yg diberikan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Pinjaman Bulanan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPinjamanBulananAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiPinjamanBulananDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiPinjamanBulananKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPinjamanBulananAWDebet+$MutasiPinjamanBulananDebet-$MutasiPinjamanBulananKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Pinjaman Musiman</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPinjamanMusimanAWDebet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiPinjamanMusimanDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiPinjamanMusimanKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPinjamanMusimanAWDebet+$MutasiPinjamanMusimanDebet-$MutasiPinjamanMusimanKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Aktiva tetap</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Harga Perolehan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumHargaPerolehanAWDebet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiHargaPerolehanDebet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiHargaPerolehanKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumHargaPerolehanAWDebet+$MutasiHargaPerolehanDebet-$MutasiHargaPerolehanKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Akumulasi Penyusutan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumAkumulasiPenyusutanAWKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiAkumulasiPenyusutanDebet ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($MutasiAkumulasiPenyusutanKredit ) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumAkumulasiPenyusutanAWKredit-$MutasiAkumulasiPenyusutanDebet+$MutasiAkumulasiPenyusutanKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Aktiva lain-lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumAktivaLainAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($MutasiAktivaLainDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiAktivaLainKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumAktivaLainAWDebet+$MutasiAktivaLainDebet-$MutasiAktivaLainKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>  
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Tabungan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Tabungan Wajib</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumTabunganWajibAWKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiTabunganWajibDebet) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($MutasiTabunganWajibKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumTabunganWajibAWKredit-$MutasiTabunganWajibDebet+$MutasiTabunganWajibKredit) }} </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Tabungan Sukarela</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumTabunganSukarelaAWKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiTabunganSukarelaDebet ) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiTabunganSukarelaKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumTabunganSukarelaAWKredit-$MutasiTabunganSukarelaDebet+$MutasiTabunganSukarelaKredit) }} </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Simpanan Berjangka</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($SumSimpananBerjangkaAWKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($SumSimpananBerjangkaAWKredit) }} </p>
                      </td>
                    </tr>

                    <!-- <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Pinjaman  di BPD</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. 0 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. 0 </p>
                      </td>
                    </tr> -->

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Pinjaman di Bank lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPinjamanBankLainAWKredit  ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPinjamanBankLainAWKredit  ) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Kewajiban lain-lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumKewajibanLainAWKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumKewajibanLainAWKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Modal</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Modal disetor</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumModalDisetorAWKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumModalDisetorAWKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Modal donasi</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumModalDonasiAWKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumModalDonasiAWKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Cadangan umum</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumCadanganUmumAWKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumCadanganUmumAWKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Cad khusus/tujuan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumCadKhususAWKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumCadKhususAWKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Cad Pinj.Ragu-ragu</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumCadRaguAWKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumCadRaguAWKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Pendapatan bunga dari</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Nasabah</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPendapatanBungaNasabahAWKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiPendapatanBungaNasabahKredit ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPendapatanBungaNasabahAWKredit+$MutasiPendapatanBungaNasabahKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Lain-lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPendapatanBungaLainAWKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiPendapatanBungaLainKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPendapatanBungaLainAWKredit+$MutasiPendapatanBungaLainKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Ongkos administrasi</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumOngkosAdministrasiAWKredit  ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($MutasiOngkosAdministrasiKredit) }} </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumOngkosAdministrasiAWKredit+$MutasiOngkosAdministrasiKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Pendapatan lain-lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPendapatanLainAWKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiPendapatanLainKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumPendapatanLainAWKredit+$MutasiPendapatanLainKredit) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Biaya Bunga</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Tabungan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaBungaTabunganAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBiayaBungaTabunganDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaBungaTabunganAWDebet+$MutasiBiayaBungaTabunganDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Simpanan berjangka</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaBungaSimpananBerjangkaAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBiayaBungaSimpananBerjangkaDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaBungaSimpananBerjangkaAWDebet+$MutasiBiayaBungaSimpananBerjangkaDebet ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Lain-lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaBungaLainAWDebet  ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBiayaBungaLainDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaBungaLainAWDebet+$MutasiBiayaBungaLainDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Biaya Pegawai</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($SumBiayaPegawaiAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBiayaPegawaiDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaPegawaiAWDebet+$MutasiBiayaPegawaiDebet ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Biaya Kantor</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($SumBiayaKantorAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBiayaKantorDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaKantorAWDebet+$MutasiBiayaKantorDebet ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Biaya Perjalanan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaPerjalananAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBiayaPerjalananDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaPerjalananAWDebet+$MutasiBiayaPerjalananDebet ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Biaya Penyusutan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaPenyusutanAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBiayaPenyusutanDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaPenyusutanAWDebet+$MutasiBiayaPenyusutanDebet ) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Biaya pinjaman ragu ragu</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaPinjamanRaguAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($MutasiBiayaPinjamanRaguDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaPinjamanRaguAWDebet+$MutasiBiayaPinjamanRaguDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Biaya Lain-lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaLainAWDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($BiayaLainAK_Debet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($SumBiayaLainAWDebet+$BiayaLainAK_Debet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-md font-weight-bold mb-0">Jumlah</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($TotalSaldoAwalDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($TotalSaldoAwalKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($TotalMutasiDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($TotalMutasiKredit) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($TotalSaldoAkhirDebet) }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($TotalSaldoAkhirKredit) }}</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
@endsection