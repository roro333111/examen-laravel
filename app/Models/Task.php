<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";
    protected $fillable = ['descripcio','completada','project_id'];

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
