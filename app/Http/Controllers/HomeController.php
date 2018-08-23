<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Pokeface\Meme\Http\Meme;


class HomeController extends BaseController
{
	public function index(){
		dd(Meme::search('求求你')->get());
	}
}
