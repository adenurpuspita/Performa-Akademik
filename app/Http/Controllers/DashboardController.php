<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latih;
use App\Models\Uji;
use App\Models\Pengajuan;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        if (strtolower($user->level) === 'admin') {
            return view('dashboard.admin');
        } elseif (strtolower($user->level) === 'guru') {
            return view('dashboard.guru');
        }

        abort(403, 'Unauthorized action.');
    }
}