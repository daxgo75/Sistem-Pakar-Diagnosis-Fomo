<?php

namespace App\Models\CertaintyFactor;

use App\Models\Gejala;
use Illuminate\Database\Eloquent\Model;

class CertaintyFactor extends Model
{
    protected $table = 'certainty_factors';
    protected $fillable = ['gejala_id', 'cf_pakar'];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}
