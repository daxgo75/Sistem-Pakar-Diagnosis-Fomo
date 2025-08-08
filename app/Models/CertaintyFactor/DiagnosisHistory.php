<?php

namespace App\Models\CertaintyFactor;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class DiagnosisHistory extends Model
{
    protected $fillable = ['user_id', 'final_cf', 'percentage', 'selected_gejala'];
    protected $casts = [
        'selected_gejala' => 'array',
        'final_cf' => 'float',
        'percentage' => 'float'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}