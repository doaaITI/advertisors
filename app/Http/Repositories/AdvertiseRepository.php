<?php

namespace App\Http\Repositories;

use App\Models\Advertise;
use App\Http\Repositories\BaseRepository;
use App\Http\Requests\AdvertiseRequest;
use Illuminate\Http\Request;

class AdvertiseRepository  extends BaseRepository
{
    /**
     * index [Use index to get data from model]
     *
     * @param  Request $request
     * @param  Int $id
     * @return Boolean
     */
    public function getAdvertises(Request $request,$conditions=[],$realtions=[],$returnQuery='',$perPage=10){

        $relations=[
            'category'=>['id','name'],
            'advertiser'=>['id','name','email'],
            'tags'=>['name']
        ];
        if(request()->has('filter') && $request->filter=='filter'){
            if(request()->has('tags')){
                $conditions['whereHas']['tags']=[
                    'key'=>'name',
                    'parameters'=>[$request->tags]
                ];
            }

            if(request()->has('advertiser')){
                $conditions['whereHas']['advertiser']=[
                    'key'=>'name',
                    'parameters'=>[$request->advertiser]
                ];
            }
            if(request()->has('title')){
                $conditions['whereLike']=[
                    'title'=>$request->title
                ];
            }
            if(request()->has('type')){
                $conditions['where']=[
                    'type'=>$request->type
                ];
            }

        }
      return $this->index($request, $conditions, $relations,'paginate',10);

    }
    /**
     * save [Use save data into Model]
     *
     * @param  Request $request
     * @param  Int $id
     * @return Boolean
     */
    public function save(AdvertiseRequest $request, int $id = null)
    {
        if($id==null){
            $model = $this->updateOrCreate($request);
            if(request()->has('tags') && count($request->tags)>0){
                $model->tags()->attach($request->tags);
            }
        }else{
            $model = $this->updateOrCreate($request,$id);
        }

        return $model;
    }

    /**
     * delete [Use to delete data from model]
     *
     * @param  Int $id
     * @return Boolean
     */
    public function deleteAdvertise( $id = null)
    {
        return $this->delete($id);
    }


    /**
     * Configure the Model
     **/
    public function model()
    {
        return Advertise::class;
    }

}
