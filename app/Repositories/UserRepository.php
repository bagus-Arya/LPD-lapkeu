<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use App\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{  
    protected $users;

    public function __construct()
    {
        $this->users = app(User::class);
    }

    public function getAllUserPaginated()
    {
        $model = $this->users->get();

        return $model;
    }

    private function reIndexCollection(Collection $collections)
    {
        $response = [];
        foreach ($collections as $collection) {
            $response[] = $collection;
        }

        return $response;
    }
}