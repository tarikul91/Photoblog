<?php

namespace App\Http\Controllers\Music;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Music extends Controller {
    function all() {
    	return view("music.all");
    }
}
