<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\ForwardChaining\Rule;
use App\Models\CertaintyFactor\CertaintyFactor;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalUsers' => User::count(),
            'totalGejala' => Gejala::count(),
            'totalPenyakit' => Penyakit::count(),
            'totalForwardChaining' => Rule::count(),
            'totalCertaintyFactor' => CertaintyFactor::count(),
        ];

        return view('admin.dashboard', $data);
    }
}