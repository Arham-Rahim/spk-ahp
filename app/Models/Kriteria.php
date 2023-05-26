<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subkriteria;

class Kriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class);
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
