<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'slug' , 'category_id' , 'description' , 'image'];

    public function category() {
        return $this->belongsTo(category::class);
    }


}
