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
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Rekening - Rekening</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Sandi</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jumlah</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="ps-4">
                        <p class="text-md font-weight-bold mb-0">A. Pendapatan Operasional</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">100</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($PendapatanOperational)}}</p>
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
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">I. Giro</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">121</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">-</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">II. Simpanan Berjangka</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">122</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">-</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">III. Pinjaman yang diberikan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">123</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">-</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">IV.Lainnya</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">124</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($HasilBungaLainnyaBankLain)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">b. Dari Pihak Ketiga bukan Bank</p>
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
                        <p class="text-xs font-weight-bold mb-0">I. Pinjaman yang diberikan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">126</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{rupiah($HasilBungaLainnyaPinjamanBukanBank)}} </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">II. Lainnya</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">129</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> Rp. {{rupiah($HasilBungaLainnyaBukanBank)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2. Pendapatan Operasional lainnya</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">170</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($PendapatanLainnya)}}</p>
                      </td>
                    </tr>

                    <!-- Biaya Operasional -->
                    <tr>
                      <td class="ps-4">
                        <p class="text-md font-weight-bold mb-0">B. Biaya Operasional</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">180</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($BiayaOperational)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">1. Biaya Bunga</p>
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
                        <p class="text-xs font-weight-bold mb-0">a. Kepada bank - bank lain</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">  </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">   </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">I. Simpanan Berjangka</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 194 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">-</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">II. Pinjaman yang diterima</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 195 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">-</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">III. Lainnya</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 199 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">-</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">b. Kepada Pihak Ketiga bukan Bank</p>
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
                        <p class="text-xs font-weight-bold mb-0">I. Simpanan Berjangka</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 203 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($SimpananBerjangkaBukanBank)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">II. Tabungan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 206 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($TabunganBukanBank)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">III. Lainnya</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> 209 </p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($LainnyaBukanBank)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2. Biaya Tenaga Kerja</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">241</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($BiayaTenagaKerja)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">3. Pemeliharaan dan Perbaikan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">280</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($PemeliharaanPerbaikan)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">4. Penyusutan</p>
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
                        <p class="text-xs font-weight-bold mb-0">a. Aktivitas tetap dan inventaris</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">291</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($PenyusutanAktivitas)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">b. Piutang</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">299</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($PenyusutanPiutang)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">5. Barang dan Jasa dari Pihak Ketiga</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">300</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($BarangJasaPihakKetiga)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">6. Biaya Operasional Lainnya</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">310</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($BiayaOperationalLain)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">C.1 Laba Operasional (A-B)</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">320</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($LabaOperationalAB)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2. Rugi Operatonal (A-B)</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">330</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">D. Pendapatan Non Operasional</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">340</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">E. Biaya Non Operasional</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">390</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">F.1. Laba Non Operatonal (D-E)</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">450</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($LabaNonDE)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2. Rugi Non Operatonal (E-D)</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">460</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($LabaNonED)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">G.1. Laba Tahun Berjalan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">470</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($LabaTahunBerjalan)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2. Rugi Tahun Berjalan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">480</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">H.1. Laba Tahun Lalu</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">530</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2. Rugi Tahun Lalu</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">540</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">I. Pajak Penghasilan</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">555</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"> - </p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">J.1. Jumlah Laba 2)</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">560</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Rp. {{rupiah($Jumlahlaba)}}</p>
                      </td>
                    </tr>

                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2. Jumlah Rugi 3)</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">570</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                    </tr>

                  </tbody>
                </table>
</body>
</html>