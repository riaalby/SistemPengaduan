<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_ruangan
 * @property integer $id_admin
 * @property string $tgl_pengaduan
 * @property string $isi_pengaduan
 * @property string $gambar
 * @property string $status_enumi
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 * @property Admin $admin
 * @property Ruangan $ruangan
 * @property RiwayatPengaduan[] $riwayatPengaduans
 */
class Pengaduan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pengaduan';

    /**
     * @var array
     */
    protected $fillable = ['id_ruangan', 'id_staf', 'tgl_pengaduan', 'isi_pengaduan', 'gambar', 'status_enumi', 'keterangan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staf()
    {
        return $this->belongsTo('App\Models\Staf', 'id_staf');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ruangan()
    {
        return $this->belongsTo('App\Models\Ruangan', 'id_ruangan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function riwayatPengaduans()
    {
        return $this->hasMany('App\Models\RiwayatPengaduan', 'id_pengaduan');
    }
}
