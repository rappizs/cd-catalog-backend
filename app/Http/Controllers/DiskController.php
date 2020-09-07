<?php

namespace App\Http\Controllers;

use App\Disk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiskController extends Controller
{
    public function index(Request $requset){
        return Disk::all();
    }

    public function store(Request $request){
        $disk = new Disk();
        $disk->id = Str::uuid();
        $disk->artist_id = $request->artist_id;
        $disk->album = $request->album;
        $disk->year = $request->year;
        $disk->title = $request->title;
        $disk->style_id = $request->style_id;
        $disk->song_count = $request->song_count;

        try {
            $disk->save();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }

    public function show(Request $request, $id)
    {
        return Disk::findOrFail($id);
    }

    public function delete(Request $request, $id){

    }
}
