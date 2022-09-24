<?php

namespace App\Http\Services;

use App\Http\Repositories\TagRepository;
use Illuminate\Http\Request;
class TagService
{

    public $repo;
    /**
     * Create a new Repository instance.
     *
     * @param TagRepositoy $repository
     * @return void
     */
    public function __construct(TagRepository $repository)
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
        return $this->repo->getTags($request);
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
        return $this->repo->deleteTag($id);
    }

}
