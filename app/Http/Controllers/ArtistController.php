<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtistController extends Controller
{
    public function index(Request $requset){
        return Artist::all();
    }

    public function store(Request $request){
        $artist = new Artist();
        $artist->id = Str::uuid();
        $artist->name = $request->name;

        try {
            $artist->save();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }

    public function show(Request $request, $id)
    {
        return Artist::findOrFail($id);
    }

    public function delete(Request $request, $id){

    }
}
