<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function semillero()
    {
        return $this->belongsTo(Semillero::class, 'semillero_id', 'id');
    }
}
