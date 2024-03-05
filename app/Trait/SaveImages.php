<?php
namespace App\Trait;

use App\Models\Album;
use App\Models\Image;




trait SaveImages{
    public static function saveImage($album_id,$files){

        foreach($files['file']??$files as $file){
            $new_name=md5(uniqid()).".".$file->extension();
            Image::create([
                "album_id"=>$album_id,
                "file"=>$new_name
            ]);
            $file->storeAs("public/images/".$new_name);
        }
    }

    public  function DeleteImage($file,$id){
        Image::where("album_id",$id)->delete();
        foreach($file as $file){
            unlink(storage_path('app/public/images/'. $file));
        }
    }

    public function updateAlbum($rquest,$id){
        try{


                Album::findOrfail($id)->update($rquest->only('name'));
                $file=Image::where('album_id',$id)->pluck('file');
                $this->DeleteImage($file,$id);
                $files=$rquest->only('file')??$file;
                $this->saveImage($id,$files);
                return redirect()->route('album.index');


        }catch(Exception $e){
            return abort(401);
        }
    }
}
