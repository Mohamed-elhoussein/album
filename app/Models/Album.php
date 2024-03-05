<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
protected $fillable=["name"];
    public function images(){
        return $this->hasMany(Image::class,'album_id',"id");
    }
}
