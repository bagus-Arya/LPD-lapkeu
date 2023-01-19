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
        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Uraian</th>
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

</body>
</html>