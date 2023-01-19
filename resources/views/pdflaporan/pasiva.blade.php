<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
#tablestyle {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse:collapse;
    width:100%;
}
#tablestyle td, #tablestyle th {
    border:1px solid #ddd;
    padding: 8px;
}
</style>
<body>
<table id="tablestyle" class="table align-items-center mb-0" cellpadding="10px">
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPTabungan) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPSimpananBerjangka) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">-</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPPinjamanDiterima) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPRupaPasiva) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPModalDisetor) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPCadanganUmum) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPLaba) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPasiva) }} </p>
                      </td>
                    </tr>
                  </tbody>
                </table>
</html>