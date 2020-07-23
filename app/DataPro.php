<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class DataPro extends Model
{
    use SoftDeletes;
    protected $fillable =['id','region','provinsi','kota','klasifikasi','subklasifikasi','kriteria','toko','alamat','alamat2','phone','faxs','email','hp','contact','b_day','alamat_rumah','religion','celebration','status','gambar','gambar2','id','id_prov','id_kota','keterangan'];
    protected $dates=['d_day','deleted_at'];
    
}
