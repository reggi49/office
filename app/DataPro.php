<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class DataPro extends Model
{
    protected $fillable =['no','region','provinsi','kota','kecamatan','toko','alamat','alamat2','phone','faxs','email','hp','contact','b_day','alamat_rumah','religion','celebration','status','gambar','gambar2','id','id_prov','id_kota','keterangan'];
    protected $dates=['d_day'];
    
}
