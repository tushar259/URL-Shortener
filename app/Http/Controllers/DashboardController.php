<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
    	$userId = Auth::id();
    	$user = User::find($userId);

        $userUrls = $user->urls;

    	return view('dashboard', ['userUrls' => $userUrls, 'userId' => $userId]);
    }
}
