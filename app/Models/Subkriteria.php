<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Kriteria;
use App\Models\Penilaian;

class Subkriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}
