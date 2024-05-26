<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_ruangan
 * @property string $nama
 * @property string $jabatan
 * @property string $created_at
 * @property string $updated_at
 * @property Pengaduan[] $pengaduans
 * @property Ruangan $ruangan
 */
class Staf extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'staf';

    /**
     * @var array
     */
    protected $fillable = ['id_ruangan', 'nama', 'jabatan', 'user_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengaduans()
    {
        return $this->hasMany('App\Models\Pengaduan', 'id_staf');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ruangan()
    {
        return $this->belongsTo('App\Models\Ruangan', 'id_ruangan');
    }
}
