<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function about(){

		$people = ['Mitesh','Neha'];

		return view('welcome', compact('people'));
	}
}
