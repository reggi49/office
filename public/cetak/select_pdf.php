<?php
include('header.php');
?>
  <script type="text/javascript">

  function pilihan()
  {
     // membaca jumlah komponen dalam form bernama 'myform'
     var jumKomponen = document.myform.length;

     // jika checkbox 'Pilih Semua' dipilih
     if (document.myform[0].checked == true)
     {
        // semua checkbox pada data akan terpilih
        for (i=1; i<=jumKomponen; i++)
        {
            if (document.myform[i].type == "checkbox") document.myform[i].checked = true;
        }
     }
     // jika checkbox 'Pilih Semua' tidak dipilih
     else if (document.myform[0].checked == false)
        {
            // semua checkbox pada data tidak dipilih
            for (i=1; i<=jumKomponen; i++)
            {
               if (document.myform[i].type == "checkbox") document.myform[i].checked = false;
            }
        }
  }

</script>
<div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Basic table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
<div class="card">
<div class="card-header">
    <strong class="card-title">Pilih yang akan di Cetak</strong>
</div>
<?php 

// koneksi mysql

//session_start();
include "config/koneksi.php";
// Hapus data pro palsu
$kosong = "delete from data_pro_palsu";
mysqli_query($connect, $kosong);
echo "<div class=grid_12> ";
// bagian script untuk menghapus data

if ($_GET['action'] == "del")
{
   // membaca nilai n dari hidden value
   $n = $_POST['n'];

   for ($i=0; $i<=$n-1; $i++)
   {
     if (isset($_POST['nim'.$i]))
     {
       $nim = $_POST['nim'.$i];
       $query = "INSERT INTO data_pro_palsu SELECT * FROM data_pro where no='$nim'";
       mysql_query($query);
	  
     }
   }
   echo "sukses";
}

// query SQL untuk menampilkan semua data
if (isset($_POST['nameCat']))
{
   $namafile = $_POST['penting'];
   if(!empty($namafile)){
			if (empty($bagianWhere))
		   {
				$bagianWhere .= "status like '$namafile'";
		   }
		   else
		   {
				$bagianWhere .= " AND status like '$namafile'";
		   }
   }
}

if (isset($_POST['pengCat']))
{
   $namafile = $_POST['region'];
   if(!empty($namafile)){
			if (empty($bagianWhere))
		   {
						$bagianWhere .= "region like '$namafile'";
		   }
		   else
		   {
				$bagianWhere .= " and region like '$namafile'";
				$bagianWhere .= " and region like '$namafile'";
		   }
   }
}

if (isset($_POST['proCat']))
{
   $namafile = $_POST['propinsi'];
   if(!empty($namafile)){
		if (empty($bagianWhere))
	   {
					$bagianWhere .= "provinsi like '%$namafile%'";
	   }
	   else
	   {
			$bagianWhere .= " AND provinsi like '%$namafile%'";
	   }
   }
}

if (isset($_POST['proKla']))
{
   $namafile = $_POST['klasifikasi'];
   if(!empty($namafile)){
		if (empty($bagianWhere))
	   {
					$bagianWhere .= "kecamatan like '%$namafile%'";
	   }
	   else
	   {
			$bagianWhere .= " AND kecamatan like '%$namafile%'";
	   }
   }
}

if (isset($_POST['desCat']))
{
   $namafile = $_POST['toko'];
   if(!empty($namafile)){
	   if (empty($bagianWhere))
	   {
					$bagianWhere .= "toko like '%$namafile%'";
	   }
	   else
	   {
			$bagianWhere .= " AND toko like '%$namafile%'";
	   }
   }
}

$sql = "select * from data_pro where ".$bagianWhere;
// batasan

$hasil = mysqli_query($connect, $sql);
if(mysqli_num_rows( $hasil)>0){ 
	// membuat form  data

	echo "<div class='card-body'><form name='myform' method='post' action='report_pdf.php' taret='_blank'>";
	echo "<table class='table table-bordered' border='1'>";
	echo "<thead><tr><td><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua</td><td><b>Region</b></td><td><b>Klasifikasi</b></td><td><b>kode</b></td><td><b>Toko</b></td><td><b>Alamat</b></td><td><b>Telepon</b></td><td><b>Handphone</b></td><td><b>Provinsi</b></td></tr></thead>";
	$i = 0;
	while($data = mysqli_fetch_array($hasil))
	{
	  echo "<tr><td><input type='checkbox' name='no[]' value='".$data['no']."' /></td>
	   <td>".$data['region']."</td>
		<td>".$data['kecamatan']."</td>
		<td>".$data['status']."</td>
	  <td>".$data['toko']."</td>
	  <td>".$data['alamat']."</td>
	  <td>".$data['phone']."</td>
	  <td>".$data['hp']."</td>
	  <td>".$data['provinsi']."</td></tr>";
	  $i++;
	}
	echo "</table></div>";
	echo "<input type='hidden' name='n' value='".$i."' />";
	echo "Sticker: <select name='kertas'><option value='continous'>continous</option><option value='tom'>tom & jerry</option><option value='a4'>A4 + border</option></select>";
	echo "<p><input type='submit' class='btn btn-success btn-sm' value='Pilih' name='submit'></p>";
	echo "</form></div>";
}else{
	echo "Sorry, data is empty. Please try again.";
}

include('footer.php');
?>