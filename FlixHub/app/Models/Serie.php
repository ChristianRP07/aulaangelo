<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Temporada;

class Serie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'categoria', 'streaming', 'status'];

    public function temporadas(): HasMany
    {
        return $this->hasMany(Temporada::class);
    }

    public function alterarStatus(): void
    {
        if ($this->statusNaoAssistido()) {
            $this->status = 'assistido';
        } else {
            $this->status = 'não-assistido';
        }
    }

    private function statusNaoAssistido(): bool
    {
        return ($this->status === 'não-assistido') ? true : false;
    }
}
