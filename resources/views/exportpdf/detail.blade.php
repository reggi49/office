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
<h1 style="text-align: center;"><img style="font-size: 14px; float: left;" src="https://www.mbtech.info/images/MBtech-Logo.png" alt="" width="150" height="100" /></h1>
<h1 style="text-align: center;"><strong>PT POLYSTAR INTERNATIONAL</strong></h1>
<p style="text-align: center;">Jalan Boulevard Raya Blok WE2 No. 3D, Kelapa Gading Timur,</p>
<p style="text-align: center;">Kelapa Gading, Kota Jakarta Utara, Daerah Khusus Ibukota Jakarta 14240</p>
<p style="text-align: center;">Telepon:(021) 45842598</p>
<hr />
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: left;">Data<strong>&nbsp;</strong>seat maker :</p>
<p style="text-align: left; padding-left: 30px;">&nbsp;</p>
<table style="margin-left: 30px;">
<tbody style="padding-left: 30px;">
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Region</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->region}}</td>
</tr>
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Provinsi</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->provinsi}}</td>
</tr>
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Kota</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->kota}}</td>
</tr>
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Nama Toko</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->toko}}</td>
</tr>
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Kontak</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->contact}}</td>
</tr>
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Phone</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->phone}}</td>
</tr>
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Email</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->email}}</td>
</tr>
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">No. HP</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->hp}}</td>
</tr>
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Tanggal Lahir</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->b_day}}</td>
</tr>
{{-- <tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Agama</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->religion}}</td>
</tr>
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Hari Raya</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->celebration}}</td>
</tr> --}}
<tr style="padding-left: 30px;">
<td style="padding-left: 30px;">Alamat</td>
<td style="padding-left: 30px;">:</td>
<td style="padding-left: 30px;">{{$data->alamat}}</td>
</tr>
</tbody>
</table>

   </body>
</html>