<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Developer;
use App\Models\Genre;

class GameController extends Controller
{
    public function index() {
        $games = Game::with('developer')->get();
        return view('game/index', ['games' => $games]);
    }

    public function add() {
        $developers = Developer::all(["id", "firstName", "lastName"]);
        $genres = Genre::all(["id", "genreName"]);
        return view("game/form", ["developers" => $developers, "genres" => $genres]);
    }

    public function update($id) {
        $game = Game::with('developer')->find($id);
        $developers = Developer::all(["id", "firstName", "lastName"]);
        $genres = Genre::all(["id", "genreName"]);
        $game_genre = $game->genres->pluck("id")->toArray();
        return view("game/form", ["game" => $game, "developers" => $developers, "genres" => $genres, "game_genre" => $game_genre]);
    }

    public function save(Request $request) {
        if ($request->id) {
            $game = Game::find($request->id);
        } else {
            $game = new Game();
        }
        $game->gameName = $request->gameName;
        $game->developer_id = $request->developer_id;
        $game->save();
        $game->genres()->detach();
        $game->genres()->attach($request->genre_id);
        return redirect("/game");
    }

    public function delete(Request $request) {
        if ($request->method() == "POST") {
            Game::find($request->id)->delete();
            return redirect("/game");
        } else {
            $game = Game::find($request->id);
            return view("game/delete", ["game" => $game]);
        }
    }
}
