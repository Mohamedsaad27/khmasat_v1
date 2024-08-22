<?php

namespace App\Interfaces;

use Illuminate\Http\Client\Request;

interface CrudInterface
{
    public function index();
    public function create();
    public function store(Request $request);
    public function edit($id);
    public function update();
    public function destroy($id);

}
