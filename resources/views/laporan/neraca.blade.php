@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Aktiva</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" cellpadding="10px">
                  <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pos - Pos</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Sandi</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jumlah</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Kas</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">100</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalKas) }}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Antar Bank Aktiva</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 130 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">a. Giro</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">131</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">b. Tabungan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">131</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">c. Deposito</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">131</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Pinjaman</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 171 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">a. Pinjaman yang diberikan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">172</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">b. Cadangan Piutang ragu-ragu</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">211</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Aktiva Tetap dan Inventaris</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">a. Harga perolehan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">212</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">b. Akumulasi penyusutan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">212</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Rupa-rupa Aktiva</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 230 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-md font-weight-bold mb-0">Jumlah Aktiva</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 290 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Pasiva -->

        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Pasiva</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" cellpadding="10px">
                  <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pos - Pos</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Sandi</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jumlah</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Tabungan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">320</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Simpanan Berjangka</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 330 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Antar Bank Passiva</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">350</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Pinjaman yang Diterima</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">369</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Rupa-rupa passiva</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">400</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">Modal</p>
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
                        <p class="text-xs font-weight-bold mb-0">Modal disetor : Modal dasar</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">421</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Cadangan Umum</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">430</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">Laba / Rugi</p>
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
                        <p class="text-xs font-weight-bold mb-0">a. Laba</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">441</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-xs font-weight-bold mb-0">b. Rugi</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">442</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-5">
                        <p class="text-md font-weight-bold mb-0">Jumlah Pasiva</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 490 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
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