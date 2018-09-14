<?php
include "config/koneksi.php";
if(isset($_POST['submit'])){
	$where = '';
	foreach($_POST['no'] as $no){
		$where = $where.'id = "'.$no.'" or ';
	}
	$where 		= substr($where, 0, strlen($where)-4);
	$qpdf		= mysqli_query($connect,"select  * from data_pros where ".$where);
	// print($qpdf);die;
	$kertas		= $_POST['kertas'];

	if($kertas  == "continous"){
		$content	= "<table style='width:680.31496063px '><tr>";
		$i			= 0;
		while($dpdf = mysqli_fetch_assoc($qpdf)){
			if($i % 2 == 0){
				$content .= "</tr><tr>";
			}
			$content	.= "<td style='width:207.874015748px; height:94.488188976px;  vertical-align:top; text-align:center; font-family:Arial; font-size:9px; margin:6.42519685px; margin-bottom:9.448818898px;'><b><br/>Kepada Yth. <br/><br/>".$dpdf['toko']."</b><br/>".$dpdf['alamat']."<br/>".$dpdf['provinsi']."<br/>".$dpdf['hp']."</td>";
			$i++;
		}
		$content	.= "</tr></table>";
		$paper_height = 140;
		$paper_width  = 140;
		require_once('pdf/html2pdf.class.php');
		try
		{ 
			$html2pdf = new HTML2PDF('P', array($paper_width, $paper_height), 'en', true, 'UTF-8', array(15,1.5,15, 0));
			$html2pdf->MarginLeft = 0;
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('report_pdf.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
	if($kertas  == "tom"){
		$content	= "<table style=''><tr>";
		$i			= 0;
		while($dpdf = mysqli_fetch_assoc($qpdf)){
			if($i % 2 == 0){
				$content .= "</tr><tr>";
			}
			$content	.= "<td style='width:297px;   vertical-align:top; text-align:center; font-family:Arial; font-size:11px; line-height:15px;  height:147.0862px; float:left;margin:9.4px 15px 9.4px 40px ;'><b><br/>KEPADA YTH. <br/> <span style=' text-transform:uppercase;'>".$dpdf['contact']."</span><br/>".$dpdf['toko']."</b><br/> <p style='padding: -10px 10px 0 15px'>".$dpdf['alamat']."<br/> ".$dpdf['provinsi']."<br/>".$dpdf['hp']."</p></td>";
			$i++;
		}
		$content	.= "</tr></table>";
		$paper_width  = 173;
		$paper_height = 220;
		require_once('pdf/html2pdf.class.php');
		try
		{ 
			$html2pdf = new HTML2PDF('P', array($paper_width, $paper_height), 'en', true, 'UTF-8', array(5.5,5.5,5.5, 5.5));
			$html2pdf->MarginLeft = 0;
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('report_pdf.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
	if($kertas  == "a4"){
		$content	= "<table style='width:1022px '><tr>";
		$i			= 0;
		while($dpdf = mysqli_fetch_assoc($qpdf)){
			if($i % 3 == 0){
				$content .= "</tr><tr>";
			}
			$content	.= "<td style='width:245.669291339px;  border:solid 1px; vertical-align:top; text-align:center; font-family:Arial; font-size:10px; height:105.826771654px; float:left;margin:9.448818898px;'><b><br/>Kepada Yth. <br/>".$dpdf['contact']."<br/>".$dpdf['toko']."</b><br/>".$dpdf['alamat']."<br/>".$dpdf['provinsi']."<br/>".$dpdf['hp']."<br/>".$dpdf['phone']."</td>";
			$i++;
		}
		$content	.= "</tr></table>";
		$paper_height = 297;
		$paper_width  = 210;
		require_once('pdf/html2pdf.class.php');
		try
		{ 
			$html2pdf = new HTML2PDF('P', array($paper_width, $paper_height), 'en', true, 'UTF-8', array(5.5,5.5,5.5, 5.5));
			$html2pdf->MarginLeft = 0;
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('report_pdf.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
	//echo $content;
}
?>