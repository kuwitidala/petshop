<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stocks.index', compact('stocks'));
    }

    public function create()
    {
        return view('admin.stocks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('stocks', 'public');
        }

        Stock::create($validated);

        return redirect()->route('admin.stocks.index')
            ->with('success', 'Акция добавлена!');
    }

    public function edit(Stock $stock)
    {
        return view('admin.stocks.edit', compact('stock'));
    }

    public function update(Request $request, Stock $stock)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($stock->image) {
                Storage::disk('public')->delete($stock->image);
            }

            $validated['image'] = $request->file('image')->store('stocks', 'public');
        }

        $stock->update($validated);

        return redirect()->route('admin.stocks.index')
            ->with('success', 'Акция обновлена!');
    }

    public function destroy(Stock $stock)
    {
        if ($stock->image) {
            Storage::disk('public')->delete($stock->image);
        }

        $stock->delete();

        return redirect()->route('admin.stocks.index')
            ->with('success', 'Акция удалена!');
    }
}