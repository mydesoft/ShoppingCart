<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // public function PresentPrice() 		
    // {
    // 	return money_format('#%i', $this->price / 100);
    // }


// Using Query Scope
    public function scopeMightLike($query){
    	return $query->inRandomOrder()->take(4);
    }
}
