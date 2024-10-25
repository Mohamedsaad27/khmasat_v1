<?php

namespace App\Http\Controllers\Admin;

use App\Models\Benefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BenefitPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benefits = Benefit::all();
        return view('admin.benefit.index', compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.benefit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Benefit::create($data);
        return redirect()->route('benefits.index')->with('successCreate', 'تم إضافة الميزة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $benefit = Benefit::findOrFail($id);
        return view('admin.benefit.edit', compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $benefit = Benefit::findOrFail($id);
        $benefit->update($data);
        return redirect()->route('benefits.index')->with('successUpdate', 'تم تعديل الميزة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $benefit = Benefit::findOrFail($id);
        $benefit->delete();
        return redirect()->route('benefits.index')->with('success', 'تم حذف الميزة بنجاح');
    }
}
