<?php

namespace App\Models;

use App\Models\CertaintyFactor\CertaintyFactor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_g',
        'nama_gejala',
    ];

    protected $table = 'gejalas';

    public function certaintyFactor()
    {
        return $this->hasMany(CertaintyFactor::class);
    }
}
