<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UrlRequest;
use Illuminate\Support\Str;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApiController extends Controller
{
    public function shorten(UrlRequest $request){
    	
    	$longUrl = $request->input("urlEntered");
    	$userId = $request->input("userId");
    	$shortUrl = Str::random(10);

    	$foundRow = Url::checkIfUrlExist($longUrl, $shortUrl);
    	if($foundRow == true){
    		return response()->json(['success' => false, 'message' => "URL already exist!"]);
    	}    	
    	
		$urlInserted = Url::insert($userId, $longUrl, $shortUrl);

		if($urlInserted == true){
			return response()->json([
				'success' => true, 
				'message' => "URL inserted successfully.",
				'data' => "Short URL: <a href='/".$longUrl."' style='text-decoration: underline;'>".$shortUrl."</a>"
			]);
		}
		else{
			return response()->json(['success' => false, 'message' => "URL insertion Failed!"]);
		}
    }
}
