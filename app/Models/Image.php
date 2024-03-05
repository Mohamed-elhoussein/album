<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Trait\SaveImages;
class Image extends Model
{
    use HasFactory,SaveImages;
    protected $fillable=["album_id","file"];

    public function album(){
        return $this->belongsTo(Album::class,"id",'album_id');
    }
}
