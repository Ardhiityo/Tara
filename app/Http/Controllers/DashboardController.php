<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('merchant')) {
            $merchant = Auth::user()->merchant;
            $services = Service::where('merchant_id', $merchant->id)->paginate(5);
            $merchant_status = ucfirst($merchant->status);
            return view('dashboard', compact('services', 'merchant_status'));
        }
        $merchants = Merchant::with('user')->paginate(5);
        return view('dashboard', compact('merchants'));
    }
}
