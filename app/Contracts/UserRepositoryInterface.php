<?php

namespace App\Contracts;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getAllUserPaginated();
}