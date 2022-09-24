<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Services\TagService ;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $service;
    public function __construct(TagService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data= $this->service->index(new Request());
       return message(true,$data,'Tags returned Successfully',200);
    }

    /**
     * Display a one Raw of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
       return message(true,$tag,'Tags returned Successfully',200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {

        $tag = $this->service->save($request);
        if($tag){
            return message(true,$tag,'Tags Saved Successfully',200);
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
    public function update(TagRequest $request)
    {

        $tag = $this->service->save($request, $request->id);
        if($tag){
            return message(true,$tag,'Tags Updated Successfully',200);
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
    public function destroy(TagRequest $request)
    {
       $tag= $this->service->delete($request->id);

       if($tag){
        return message(true,$tag,'Tags Deleted Successfully',200);
        }else{
            return message(false,[],'Something went Wrong',400);
        }

    }
}
