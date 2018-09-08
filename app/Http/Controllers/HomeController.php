<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Pokeface\MemeServer\Facades\MemeServer;


class HomeController extends BaseController
{
	public function index(){
		dd(MemeServer::search('求求你'));
	}
}
