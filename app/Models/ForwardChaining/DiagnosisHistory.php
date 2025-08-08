<?php

namespace App\Models\ForwardChaining;

use App\Models\User;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiagnosisHistory extends Model
{
    use HasFactory;

    protected $table = 'forward_chaining_diagnosis_histories';

    protected $fillable = [
        'user_id',
        'penyakit_id',
        'match_percentage'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, 'diagnosis_gejala', 'diagnosis_id', 'gejala_id');
    }
}