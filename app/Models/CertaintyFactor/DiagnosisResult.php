<?php

namespace App\Models\CertaintyFactor;

use Illuminate\Database\Eloquent\Model;

class DiagnosisResult extends Model
{
    protected $fillable = [
        'user_id',
        'cf_value',
        'gejala_terpilih'
    ];

    protected $casts = [
        'gejala_terpilih' => 'array'
    ];
}
