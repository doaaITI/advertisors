<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Http\Repositories\CategoryRepository;
use Illuminate\Http\Request;
class CategoryService
{

    public $repo;
    /**
     * Create a new Repository instance.
     *
     * @param CategoryRepository $repository
     * @return void
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repo = $repository;

    }

    /**
     * Use Search Criteria from request to find from Repository
     *
     * @param Request $request
     * @return Collection
     */

    public function index(Request $request){
        return $this->repo->getCateories($request);
    }



    /**
     * Use save data into Repository
     *
     * @param Request $request
     * @param Int $id
     * @return Boolean
     */
    public function save(Request $request, $id = null)
    {
        return $this->repo->save($request, $id);
    }


    public function delete( $id = null)
    {
        return $this->repo->deleteCategory($id);
    }

}
