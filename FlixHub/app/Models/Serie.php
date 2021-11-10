<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Temporada;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'categoria', 'streaming', 'status'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
