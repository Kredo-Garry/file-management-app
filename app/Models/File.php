<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Note;

class File extends Model
{
    use HasFactory;

    public function note(){
        return $this->hasMany(Note::class);
    }
}
