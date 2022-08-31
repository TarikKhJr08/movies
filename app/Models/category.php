<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    protected $fillable = ['name' , 'slug'];
    use HasFactory;



    public function getRouteKeyName(){
        return 'slug';
    }

    public function post() {
        return $this->hasMany(post::class);
    }

}
