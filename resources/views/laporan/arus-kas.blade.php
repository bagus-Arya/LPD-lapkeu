@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Arus Kas</h6>
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
                          <p class="text-xs font-weight-bold mb-0">Kas</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0">10000000</p>
                        </td>
                        <td class="text-center">
                          <p class="text-xs font-weight-bold mb-0">1659500</p>
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