<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_transaksi','id_petugas','nisn','tgl_bayar','bulan_dibayar','tahun_dibayar','id_spp','jumlah_bayar'
    ];

    public function siswa(){
        return $this->belongsTo(Kelas::class, 'nisn');
    }
    public function spp(){
        return $this->belongsTo(Spp::class, 'id_spp');
    }
    public function user(){
        return $this->belongsTo(Spp::class, 'id');
    }
}
