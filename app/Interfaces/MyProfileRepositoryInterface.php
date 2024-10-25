<?php

namespace App\Interfaces;

interface MyProfileRepositoryInterface
{
    public function index();
    public function update(array $data);
    public function destroy();

}
