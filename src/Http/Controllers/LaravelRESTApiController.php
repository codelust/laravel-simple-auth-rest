<?php

namespace Frontiernxt\LaravelRESTApi\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Frontiernxt\LaravelRESTApi\Events\Emitters\NewUser;

class LaravelRESTApiController extends Controller
{
    //
    public function add($a, $b){
    	//echo $a + $b;        
    	$result = $a + $b;
    	return view('fnxt-laravel-rest-api::add', compact('result'));
    }

    public function subtract($a, $b){
    	echo $a - $b;
    }


    public function show()
    {
    	event(new NewUser('Shyam'));
    	return array('result' => 20);
    }
}
