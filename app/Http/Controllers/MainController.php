<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $category = $request->query('category');

        if ($keyword || $category) {
            $services = Service::with('category', 'merchant')
            ->whereHas('merchant', fn ($query) => $query->where('status', 'active'))
            ->whereHas('category',fn($query) => $query->where('slug', $category))
            ->whereLike('title', "%$keyword%")
            ->paginate(5);
        } else {
            $services = Service::with('category', 'merchant')
            ->whereHas('merchant', fn ($query) => $query->where('status', 'active'))->paginate(5);
        }

        $categories = Category::get();

        return view('index', compact('services', 'categories'));
    }

    public function show(Service $service)
    {
        $service->load(['merchant.user', 'category']);

        return view('show', compact('service'));
    }
}
