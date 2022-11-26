@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Laba / Rugi</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" cellpadding="10px">
                  <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Rekening - Rekening</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Sandi</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jumlah</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="ps-4">
                        <p class="text-md font-weight-bold mb-0">A. Pendapatan Operational</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">100</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">23347</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">1. Hasil Bunga</p>
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
                        <p class="text-xs font-weight-bold mb-0">a. Dari Bank lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">100</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">23347</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">I. Giro</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">II. Simpanan Berjangka</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">III. Pinjaman yang diberikan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">b. Dari Pihak Ketiga bukan Bank</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">100</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">23347</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">I. Pinjaman yang diberikan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">II. Lainnya</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">0</p>
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