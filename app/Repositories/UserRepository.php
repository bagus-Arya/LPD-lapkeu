<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use App\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
// use App\Models\Settings;

class UserRepository implements UserRepositoryInterface
{  
    // protected $settings;

    // public function __construct()
    // {
    //     $this->settings = app(Settings::class);
    // }

    // public function getEmployeesPaginated($request, $limit = 10, $offset = 0)
    // {
    //     $response = [];
    //     $model = $this->employees;

    //     $total = $model->count();

    //     if ($request->has('pagination.perpage')) {
    //         $limit = $request->get('pagination')['perpage'];
    //     }

    //     if ($request->has('pagination.page')) {
    //         $offset = $request->get('pagination')['page'];
    //         $offset = $offset - 1;
    //         $offset = $offset * $limit;
    //     }

    //     $pages = $model->count();

    //     $data = $model->skip($offset)->take($limit)->get();

    //     $page = $request->get('pagination')['page'];	
    //     if(count($data)==0){
    //         $page = "1";
    //         $offset = 0;
    //         $data = $model->skip($offset)->take($limit)->get();
    //     }

    //     if ($request->has('sort.sort')) {
    //         $isSortDecending = true;
    //         if ($request->get('sort')['sort'] == 'asc') {
    //             $isSortDecending = false;
    //         }
    //         $data = $data->sortBy($request->get('sort')['field'], SORT_REGULAR, $isSortDecending);
    //     }

    //     $data = $this->reIndexCollection($data);

    //     $meta = [
    //         'page' => $page,
    //         'pages' => $pages,
    //         'perpage' => $limit,
    //         'total' => $total,
    //     ];
    //     $response['meta'] = $meta;
    //     $response['data'] = $data;

    //     return $response;
    // }

    // private function reIndexCollection(Collection $collections)
    // {
    //     $response = [];
    //     foreach ($collections as $collection) {
    //         $response[] = $collection;
    //     }

    //     return $response;
    // }
}
