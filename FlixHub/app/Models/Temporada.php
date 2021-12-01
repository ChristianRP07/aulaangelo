<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Serie;
use App\Models\Episodios;

class Temporada extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['serie_id', 'nome', 'quant_temp'];

    public function episodios(): HasMany
    {
        return $this->hasMany(Episodios::class);
    }
    
    public function series(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }
}