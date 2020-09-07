<?php

namespace App\Http\Controllers;

use App\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StyleController extends Controller
{
    public function index(Request $requset){
        return Style::all();
    }

    public function store(Request $request){
        $style = new Style();
        $style->id = Str::uuid();
        $style->name = $request->name;

        try {
            $style->save();
        } catch (\Throwable $th) {
            abort(response($th->getMessage(), 500));
        }
    }

    public function show(Request $request, $id)
    {
        return Style::findOrFail($id);
    }

    public function delete(Request $request, $id){

    }
}
