@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex flex-row justify-content-between">
                  <div>
                      <h5 class="mb-0">Arus Kas</h5>
                  </div>
                  <a href="{{route('pdf.kas')}}" type="button" class="btn bg-gradient-dark btn-sm mb-0"> +&nbsp;Cetak Laporan</a>

              </div>
            </div>
            <div class="card-body pt-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" cellpadding="10px">
                  <thead>
                      <tr>
                        <th rowspan="3" class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Uraian</th>
                        <th colspan="2" class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jumlah</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td class="ps-4">
                          <p class="text-ls font-weight-bold mb-0">Arus Kas Dari Aktivitas Operasi</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Pendapatan Bunga dari Nasabah</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($totalPendapatanBunga)}}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Pendapatan Lain-Lain</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($totalPendapatanLain)}}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Biaya Kantor</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($totalBiayaKantor) }}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Biaya Pegawai</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($totalBiayaPegawai) }}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Biaya Perjalanan</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($totalBiayaPerjalanan) }}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Biaya Penyusutan</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($totalBiayaPenyusutan) }}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Biaya Lain-Lain</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($totalBiayaLain) }}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                          <p class="text-ls font-weight-bold mb-0">Kas Bersih diperoleh dari Aktivitas Operational</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0">  </p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0">  Rp. {{ rupiah($kasBersihOperasi)}} </p>
                        </td>
                    </tr>
                  
                    <!--  -->
                    <tr>
                        <td class="ps-4">
                          <p class="text-ls font-weight-bold mb-0">Arus Kas Dari Aktivitas Pendanaan</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Simpanan Berjangka</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalsimpananberjangka) }}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Rupa - Rupa Pasiva</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalrupapasiva) }}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Modal Donasi</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalModalDonasi) }}</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-4">
                          <p class="text-ls font-weight-bold mb-0">Arus Kas dari Aktivitas Pendanaan</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($aruskasAktivitasPendanaan) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                          <p class="text-ls font-weight-bold mb-0">Arus Kas Akhir Periode</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. {{ rupiah($aruskasAkhirPeriode) }}</p>
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