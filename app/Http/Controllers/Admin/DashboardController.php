<?php

namespace App\Http\Controllers\Admin;

use App\Models\Durian;
use App\Http\Controllers\Controller;

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
