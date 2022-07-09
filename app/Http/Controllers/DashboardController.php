<?php

namespace App\Http\Controllers;

use App\Models\Durian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $durians = Durian::where('stock', '<=', 5)->paginate(5);

        return view('pages.dashboard-admin')->with([
            'durians' => $durians,
        ]);
    }
}
