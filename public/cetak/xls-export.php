<?php
// error_reporting(E_ALL);
ini_set('display_errors', 0);
include "config/koneksi.php";

$region = $_POST['nama_region'];

// query SQL untuk menampilkan semua data
if (isset($_POST['nameCat']))
{
   $namafile = $_POST['penting'];
   if (empty($bagianWhere))
   {
                $bagianWhere .= "status like '$namafile'";
   }
   else
   {
        $bagianWhere .= " AND status like '$namafile'";
   }
}

if (isset($_POST['pengCat']))
{
   $namafile = $_POST['region'];
   if (empty($bagianWhere))
   {
                $bagianWhere .= "region like '$namafile'";
   }
   else
   {
        $bagianWhere .= " AND region like '$namafile'";
   }
}

if (isset($_POST['proCat']))
{
   $namafile = $_POST['propinsi'];
   if (empty($bagianWhere))
   {
                $bagianWhere .= "provinsi like '%$namafile%'";
   }
   else
   {
        $bagianWhere .= " AND provinsi like '%$namafile%'";
   }
}

if (isset($_POST['proKla']))
{
   $namafile = $_POST['klasifikasi'];
   if (empty($bagianWhere))
   {
                $bagianWhere .= "kecamatan like '%$namafile%'";
   }
   else
   {
        $bagianWhere .= " AND kecamatan like '%$namafile%'";
   }
}

if (isset($_POST['desCat']))
{
   $namafile = $_POST['toko'];
   if (empty($bagianWhere))
   {
                $bagianWhere .= "toko like '%$namafile%'";
   }
   else
   {
        $bagianWhere .= " AND toko like '%$namafile%'";
   }
}








$sql = "Select region,provinsi,kota,kecamatan as Klasifikasi,status as Kode,toko,alamat,phone,faxs,email,hp,contact,b_day as Birthday,alamat_rumah,religion,celebration from data_pros where ".$bagianWhere;
$result = @mysqli_query($connect,$sql)	or die("Data Kosong atau Koneksi Bermasalah:<br>".mysqli_error($sql).'<br>'.mysqli_errno($connect));
	header('Content-Type: application/vnd-ms-excel');	//define header info for browser
	header('Content-Disposition: attachment; filename='.'mbtech'.'-'.date('Ymd').'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');

    while ($property = mysqli_fetch_field($result)) {
        echo strtoupper($property->name)."\t";
    }
    print("\n");

	// for ($i = 0; $i < mysqli_num_fields($connect,$result); $i++)	 // show column names as names of MySQL fields
	// 	echo mysqli_field_name($result, $i)."\t";
	// print("\n");

	while($row = mysqli_fetch_row($result))
	{
		//set_time_limit(60); // you can enable this if you have lot of data
		$output = '';
		for($j=0; $j<mysqli_num_fields($result); $j++)
		{
			if(!isset($row[$j]))
				$output .= "NULL\t";
			else
				$output .= "$row[$j]\t";
		}
		$output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
		print(trim($output))."\t\n";
	}
?>
