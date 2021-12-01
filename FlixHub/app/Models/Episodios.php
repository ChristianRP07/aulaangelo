<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Temporada;

class Episodios extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['temporada_id', 'nome', 'quant_ep'];

    
    public function temporadas(): BelongsTo
    {
        return $this->belongsTo(Temporada::class);
    }
}
