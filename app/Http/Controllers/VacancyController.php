<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'title' => 'required|max:255',
            'company' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'required',
        ]);

        $user->vacancies()->create([
            'title' => $request->title,
            'company' => $request->company,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()->back()->with(['success' => 'Lowongan berhasil dibuat']);
    }
}
