<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_pengaduan
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 * @property Pengaduan $pengaduan
 */
class RiwayatPengaduan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'riwayat_pengaduan';

    /**
     * @var array
     */
    protected $fillable = ['id_pengaduan', 'keterangan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengaduan()
    {
        return $this->belongsTo('App\Models\Pengaduan', 'id_pengaduan');
    }
}
