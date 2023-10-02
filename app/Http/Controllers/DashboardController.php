<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function clientIndex()
    {
        return view('client.dashboard');
    }

    public function workerIndex()
    {
        $vacancies = Vacancy::orderBy('created_at', 'desc')->get();
        $title = 'Daftar Lowongan Tersedia';
        return view('worker.dashboard', compact('vacancies', 'title'));
    }

    public function applyJob($id)
    {
        $user = auth()->user();
        $job = Vacancy::find($id);
        $job->users()->attach($user);
        return back()->with(['success' => 'Lamaran berhasil dikirim']);
    }

    public function historyJob()
    {
        $userId = auth()->user()->id;

        $vacancies = User::find($userId)->applies()->get();
        $title = 'Daftar Lamaran Terkirim';
        return view('worker.dashboard', compact('vacancies', 'title'));
    }

    public function jobCreated()
    {
        $userId = auth()->user()->id;

        $vacancies = User::find($userId)->vacancies()->get();
        $title = 'Lowongan Dibuat';
        return view('worker.dashboard', compact('vacancies', 'title'));
    }

    public function jobDetail($id)
    {
        $list = Vacancy::find($id);
        return view('client.detail', compact('list'));
    }
}
