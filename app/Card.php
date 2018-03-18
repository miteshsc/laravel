<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Note;

class Card extends Model
{
    protected $fillable = ['title'];

    public function notes()
    {
    	return $this->hasMany(Note::class);
    }

    public function addNote(Note $note){    	
    	return $this->notes()->save($note);
    }

    public function add($card){
    	return $this->create($card);
    }
}
