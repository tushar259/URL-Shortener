<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    // use HasFactory;
    protected $fillable = ['user_id', 'long_url', 'short_url'];

    public static function checkIfUrlExist($longUrl, $shortUrl){
    	$foundRow = self::where("long_url", $longUrl)
    		->orWhere("short_url", $shortUrl)
    		->first();

    	if($foundRow){
    		return true;
    	}
    	else{
    		return false;
    	}
    }

    public static function insert($userId, $longUrl, $shortUrl){
    	$inserted = self::create([
            'user_id' => $userId,
            'long_url' => $longUrl,
            'short_url' => $shortUrl,
        ]);

        if($inserted){
        	return true;
        }
        else{
        	return false;
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getInfoByUrl($longUrl){
    	$url = self::where('long_url', $longUrl)->first();

        if ($url) {
            $url->increment('click_count');
            $url->save();
        }

        return $url;
    }
    
}
