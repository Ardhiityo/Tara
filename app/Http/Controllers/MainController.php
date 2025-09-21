<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::with('category', 'merchant')->whereHas('merchant', function ($query) {
            $query->where('status', 'active');
        })->paginate(5);

        if ($keyword = $request->query('keyword')) {
            $services = Service::with('category', 'merchant')->whereHas('merchant', function ($query) {
                $query->where('status', 'active');
            })->whereLike('title', "%$keyword%")->paginate(5);
        }

        return view('index', compact('services'));
    }

    public function show(Service $service)
    {
        $service->load(['merchant.user', 'category']);

        return view('show', compact('service'));
    }
}
