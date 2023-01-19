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
                <table id="tablestyle"  class="table align-items-center mb-0" cellpadding="10px">
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalGiro) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalTabungan) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalDeposito) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPinjamanDiberikan) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalPiutangRagu) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalHargaPerolehan) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalAkumulasiPenyusutan) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalRupaRupa) }}</p>
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
                        <p class="text-xs font-weight-bold mb-0">Rp. {{ rupiah($totalAktiva) }}</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
</body>
</html>