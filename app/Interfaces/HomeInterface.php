<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface HomeInterface
{
    public function handleHomePage();
    public function search(Request $request);

}
