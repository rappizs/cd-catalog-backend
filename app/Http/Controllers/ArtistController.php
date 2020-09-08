<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtistController extends Controller
{
    public function search(Request $request)
    {
        $searchValue = $request->query('search-value');
        $results = [];

        if ($searchValue === null)
            return Artist::all();

        foreach (Artist::all() as $artist) {
            if (strpos(strtolower(strval($artist->name)), strtolower(strval($searchValue))) !== false) {
                $results[] = $artist;
            }
        }

        return $results;
    }

    public function store(Request $request)
    {
        $artist = new Artist();
        $artist->id = Str::uuid();
        $artist->name = $request->name;

        try {
            $artist->save();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }

    public function update(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);
        if (isset($request->name)) {
            $artist->name = $request->name;
        }

        try {
            $artist->save();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }

    public function delete(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);

        try {
            $artist->delete();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }
}
