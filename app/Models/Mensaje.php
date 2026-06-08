<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = "mensajes";
    protected $fillable = ['asunto','mensaje','leido','destinatario_id','remitente_id'];

    public function remitente(){
        return $this->belongsTo(User::class,'remitente_id');
    }

    public function destinatario(){
        return $this->belongsTo(User::class,'destinatario_id');
    }
}
