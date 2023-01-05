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
                  <button type="button" class="btn bg-gradient-dark btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addPenerimaanModal">
                      +&nbsp; Cetak Laporan
                  </button>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
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
                          <p class="text-xs font-weight-bold mb-0">Laba(Rugi) sebelum pajak & Pos Luar Biasa</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. 500.000 </p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-4">
                          <p class="text-xs font-weight-bold mb-0">Penambahan :</p>
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
                          <p class="text-xs font-weight-bold mb-0">Beban Penyusutan</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. 500.000 </p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-4">
                          <p class="text-ls font-weight-bold mb-0">Laba operasi sebelum perubahan modal kerja</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> </p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0"> Rp. 1.000.000 </p>
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