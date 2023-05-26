<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subkriteria;
use App\Models\Kriteria;
use App\Models\Alternatif;

class Penilaian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subkriteria()
    {
        return $this->belongsTo(Subkriteria::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
