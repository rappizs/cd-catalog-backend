<?php

namespace App\Http\Controllers;

use App\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StyleController extends Controller
{
    public function search(Request $request)
    {
        $searchValue = $request->query('search-value');
        $results = [];
        $type = $request->query('type');

        if ($type)
            $styles = DB::table('styles')->orderBy('name', $type)->get();
        else
            $styles = DB::table('styles')->orderBy('name', 'asc')->get();

        if ($searchValue === null)
            return $styles;

        foreach ($styles as $style) {
            if (strpos(strtolower(strval($style->name)), strtolower(strval($searchValue))) !== false) {
                $results[] = $style;
            }
        }

        return $results;
    }

    public function store(Request $request)
    {
        $style = new Style();
        $style->id = Str::uuid();
        $style->name = $request->name;

        try {
            $style->save();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }

    public function update(Request $request, $id)
    {
        $style = Style::findOrFail($id);
        if (isset($request->name)) {
            $style->name = $request->name;
        }

        try {
            $style->save();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }

    public function delete(Request $request, $id)
    {
        $style = Style::findOrFail($id);

        try {
            $style->delete();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }
}
