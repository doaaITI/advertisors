<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $service;
    public function __construct(CategoryService $service)
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
       return message(true,$data,'Categories returned Successfully',200);
    }

    /**
     * Display a one Raw of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
       return message(true,$category,'Categories returned Successfully',200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->service->save($request);
        if($category){
            return message(true,$category,'Categories Saved Successfully',200);
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
    public function update(CategoryRequest $request)
    {
        $category = $this->service->save($request, $request->id);
        if($category){
            return message(true,$category,'Categories Updated Successfully',200);
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
    public function destroy(CategoryRequest $request)
    {
       $category= $this->service->delete($request->id);

       if($category){
        return message(true,$category,'Categories Deleted Successfully',200);
        }else{
            return message(false,[],'Something went Wrong',400);
        }

    }
}
