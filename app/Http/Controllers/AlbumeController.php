<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use App\Trait\SaveImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlbumeRequest;

class AlbumeController extends Controller
{
    use SaveImages;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumeRequest $request)
    {
        DB::beginTransaction();
        try{
            $albume=Album::create($request->only("name"));
            Image::saveImage($albume->id, $request->only("file"));
            DB::commit();
            return redirect()->route('album.index')->with("success","Album created successfully");
        }catch(DBException $e){
            DB::rollBack();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album=Album::findOrfail($id);

        return view('edite',compact('album'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    return $this->updateAlbum($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        if(empty($request->input('album'))){
            ALbum::findOrfail($id)->delete();
            return redirect()->route('album.index')->with("success","Album Deleted successfully");

        }else{
            Image::where('album_id',$id)->update([
                "album_id"=>$request->input('album')
            ]);
            ALbum::findOrfail($id)->delete();
            return redirect()->route('album.index')->with("success","Album Deleted successfully");

        }
    }
}
