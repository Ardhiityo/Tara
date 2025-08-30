<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $services = Service::whereHas('merchant', function ($query) {
            $query->where('status', 'active');
        })->paginate(5);

        return view('index', compact('services'));
    }

    public function show(Service $service)
    {
        $service->load('merchant.user');

        return view('show', compact('service'));
    }
}
