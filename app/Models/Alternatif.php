<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Penilaian;

class Alternatif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}
