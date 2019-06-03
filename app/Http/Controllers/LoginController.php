<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest", ["except" => "destroy"]);
    }
    public function create()
    {
        return view("auth.login");
    }

    public function store()
    {
        if(!auth()->attempt(request(["email", "password"])))
        {
            return back()->withErrors([
                "message" => "Bad credentials. Please try again"
            ]);
        }

        session()->flash("message", "Loginovan");
        return redirect()->route("all-teams");
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route("login");
    }
}
