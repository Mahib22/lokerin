<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'client') {
            return redirect()->route('client.dashboard');
        } elseif (auth()->user()->role == 'worker') {
            return redirect()->route('worker.dashboard');
        } else {
            abort(404);
        }
    }
}
