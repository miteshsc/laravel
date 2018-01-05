<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;
use App\Note;

class NotesController extends Controller
{
   public function store(Request $request, Card $card)
   {   

   /*
   	$note = new Note;
   	$note->body = $request->body;
   	$card->notes()->save($note);
   	*/

   	/*
   	$note = new Note(['body' => $request->body]);
   	$card->notes()->save($note);
   	*/

   	/*
   	$card->notes()->save(
		new Note(['body' => $request->body])
   	);
   	*/

   	$card->addNote(new Note($request->all()));
   	//$card->notes()->create($request->all());
   	return back();
   }
}
