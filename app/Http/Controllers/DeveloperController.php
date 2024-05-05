<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DeveloperController extends Controller
{
    public function index() {
        $developers = Developer::all(["id", "firstName", "lastName"])->sortBy("firstName");
        return view("developer/index", ["developers" => $developers]);
    }

    public function add() {
        return view("developer/form");
    }

    public function update($id) {
        $developer = Developer::find($id);
        return view("developer/form", ["developer" => $developer]);
    }

    public function save(Request $request) {
        if ($request->id) {
            $developer = Developer::find($request->id);
        } else {
            $developer = new Developer();
        }
        $developer->firstName = $request->firstName;
        $developer->lastName = $request->lastName;
        $developer->save();
        return redirect("/developer");
    }

    public function delete(Request $request) {
        if ($request->method() == "POST") {
            Developer::find($request->id)->delete();
            return redirect("/developer");
        } else {
            $developer = Developer::find($request->id);
            return view("developer/delete", ["developer" => $developer]);
        }
    }
}
