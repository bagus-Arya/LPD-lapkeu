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
                      <h5 class="mb-0">Perubahan Modal</h5>
                  </div>
                  <a href="{{route('pdf.modal')}}" type="button" class="btn bg-gradient-dark btn-sm mb-0"> +&nbsp;Cetak Laporan</a>

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
                        <p class="text-xs font-weight-bold mb-0">Modal Awal</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($modalAwal)}}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Laba Bersih</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($labaBersih)}}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Total</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($total)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Prive</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($totalPrive)}}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Modal Akhir</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($modalAkhir)}}</p>
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