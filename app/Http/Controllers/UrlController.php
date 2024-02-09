<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;

class UrlController extends Controller
{
    public function redirect($longUrl){
    	$urlInfo = Url::getInfoByUrl($longUrl);

    	return view('urlinfo', ['urlInfo' => $urlInfo]);
    }
}
