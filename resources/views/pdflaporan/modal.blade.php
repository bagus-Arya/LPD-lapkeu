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
</body>
</html>