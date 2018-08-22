<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Pokeface\Meme\Facades\Meme;


class HomeController extends BaseController
{
	public function index(){
		Meme::search(123);
	}
}
