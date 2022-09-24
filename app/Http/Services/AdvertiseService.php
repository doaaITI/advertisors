<?php

namespace App\Http\Services;

use App\Models\Advertise;
use App\Http\Repositories\AdvertiseRepository;
use Illuminate\Http\Request;
class AdvertiseService
{

    public $repo;
    /**
     * Create a new Repository instance.
     *
     * @param AdvertiseRepository $repository
     * @return void
     */
    public function __construct(AdvertiseRepository $repository)
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
        return $this->repo->getAdvertises($request);
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
        return $this->repo->deleteAdvertise($id);
    }

}
