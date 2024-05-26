<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama_ruangan
 * @property string $lokasi_ruangan
 * @property string $created_at
 * @property string $updated_at
 * @property Pengaduan[] $pengaduans
 */
class Ruangan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ruangan';

    /**
     * @var array
     */
    protected $fillable = ['nama_ruangan', 'lokasi_ruangan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengaduans()
    {
        return $this->hasMany('App\Models\Pengaduan', 'id_ruangan');
    }
}
