<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all(["id", "genreName"])->sortBy("genreName");
        return view("genre/index", ["genres" => $genres]);
    }

    public function add() {
        return view("genre/form");
    }

    public function update($id) {
        $genre = Genre::find($id);
        return view("genre/form", ["genre" => $genre]);
    }

    public function save(Request $request) {
        if ($request->id) {
            $genre = Genre::find($request->id);
        } else {
            $genre = new Genre();
        }
        $genre->genreName = $request->genreName;
        $genre->save();
        return redirect("/genre");
    }

    public function delete(Request $request) {
        if ($request->method() == "POST") {
            Genre::find($request->id)->delete();
            return redirect("/genre");
        } else {
            $genre = Genre::find($request->id);
            return view("genre/delete", ["genre" => $genre]);
        }
    }
}
