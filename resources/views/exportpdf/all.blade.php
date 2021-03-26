<?php
ini_set("max_execution_time","-1");
?>
<!doctype html> 
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Detail Toko MBtech</title>
      <!-- bootstrap -->
      {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
	
	<style type="text/css">

	</style>

  </head>
  <body> 
    <h1 style="text-align: center;"><img style="font-size: 14px; float: left;" src="https://www.mbtech.app/office/images/MBtech-Logo.png?2" alt="" width="150" height="100" /></h1>
    <h1 style="text-align: center;"><strong>PT POLYSTRAR INTERNATIONAL</strong></h1>
    <p style="text-align: center;">Jalan Boulevard Raya Blok WE2 No. 3D, Kelapa Gading Timur,</p>
    <p style="text-align: center;">Kelapa Gading, Kota Jakarta Utara, Daerah Khusus Ibukota Jakarta 14240</p>
    <p style="text-align: center;">Telepon:(021) 45842598</p>
    <hr />
    <p style="text-align: center;">&nbsp;</p>
    <p style="text-align: left;">Data<strong>&nbsp;</strong>seat maker :</p>
    <p style="text-align: left; padding-left: 30px;">&nbsp;</p>
    <table>
    <tbody>
    <tr>
    <td>Kontak</td>
    <td>Toko</td>
    <td>Alamat</td>
    <td>Provinsi</td>
    <td>Phone</td>
    </tr>
    @foreach ($items as $key => $item)
    <tr>
        <td>{{ $item->contact }}</td>
        <td>{{ $item->toko }}</td>
        <td>{{ $item->alamat }}</td>
        <td>{{ $item->phone }}</td>
    </tr>
    @endforeach
  </tbody>
  </table>
  </body>
</html>