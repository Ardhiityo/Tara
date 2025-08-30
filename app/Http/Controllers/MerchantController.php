<?php

namespace App\Http\Controllers;

use App\Http\Requests\MerchantUpdateRequest;
use App\Models\Merchant;

class MerchantController extends Controller
{
    public function edit(Merchant $merchant)
    {
        return view('pages.merchant.edit', compact('merchant'));
    }

    public function update(MerchantUpdateRequest $request, Merchant $merchant)
    {
        $validated = $request->validated();

        $merchant->update([
            'biography' => $validated['biography'],
            'phone' => $validated['phone'],
            'status' => $validated['status']
        ]);

        $merchant->user()->update([
            'name' => $validated['name']
        ]);

        return redirect()->route('dashboard');
    }

    public function show(Merchant $merchant)
    {
        $merchant->load('user');
        return view('pages.merchant.show', compact('merchant'));
    }
}
