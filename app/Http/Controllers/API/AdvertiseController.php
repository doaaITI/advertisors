<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertiseRequest;
use App\Http\Services\AdvertiseService;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    protected $service;
    public function __construct(AdvertiseService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $data= $this->service->index($request);
       return message(true,$data,'Advertises returned Successfully',200);
    }

    /**
     * Display a one Raw of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Advertise $advertise)
    {
       return message(true,$advertise,'Advertises returned Successfully',200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertiseRequest $request)
    {
        $advertise = $this->service->save($request);
        if($advertise){
            return message(true,$advertise,'Advertises Saved Successfully',200);
        }else{
            return message(false,[],'Something went Wrong',400);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertiseRequest $request)
    {
        $advertise = $this->service->save($request, $request->id);
        if($advertise){
            return message(true,$advertise,'Advertises Updated Successfully',200);
        }else{
            return message(false,[],'Something went Wrong',400);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertiseRequest $request)
    {
       $advertise= $this->service->delete($request->id);

       if($advertise){
        return message(true,$advertise,'Advertises Deleted Successfully',200);
        }else{
            return message(false,[],'Something went Wrong',400);
        }

    }
}
