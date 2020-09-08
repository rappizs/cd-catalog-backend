<?php

namespace App\Http\Controllers;

use App\Disc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiscController extends Controller
{
    public function search(Request $request)
    {
        $searchValue = $request->query('search-value');
        $orderBy = $request->query('order-by');
        $type = $request->query('type');

        $discs = DB::table('discs')->orderBy($orderBy, $type)->get();

        $results = [];
        $notToSearch = ["id", "created_at", "updated_at"];

        if ($searchValue === null)
            return $discs;

        foreach ($discs as $disc) {
            foreach ($disc->getAttributes() as $key => $value) {
                if (
                    strpos(strtolower(strval($disc->$key)), strtolower(strval($searchValue))) !== false
                    && !in_array($key, $notToSearch)
                ) {
                    $results[] = $disc;
                    break;
                }
            }
        }

        return $results;
    }

    public function store(Request $request)
    {
        $disc = new Disc();
        $disc->id = Str::uuid();
        $disc->artist = $request->artist;
        $disc->album = $request->album;
        $disc->year = $request->year;
        $disc->title = $request->title;
        $disc->style = $request->style;
        $disc->song_count = $request->song_count;

        try {
            $disc->save();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }

    public function update(Request $request, $id)
    {
        $disc = Disc::findOrFail($id);
        $notToUpdate = ["id", "user_id", "created_at", "updated_at"];
        foreach ($disc->getAttributes() as $key => $value) {
            if (isset($request->$key) && !in_array($key, $notToUpdate)) {
                $disc->$key = $request->$key;
            }
        }

        try {
            $disc->save();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }

    public function show(Request $request, $id)
    {
        return Disc::findOrFail($id);
    }

    public function delete(Request $request, $id)
    {
        $disc = Disc::findOrFail($id);
        $disc->delete();
    }
}
