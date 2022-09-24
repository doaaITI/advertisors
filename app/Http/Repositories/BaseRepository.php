<?php

namespace App\Http\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseRepository
{

    /**
     * @var Model
     */
    protected $model;
    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }


    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @return Model
     * @throws \Exception
     *
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

        /**
     * index for get data takes two parameter
     *
     * @param array $input
     * @param array $where
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function index(Request $request,$conditions=[],$realtions=[],$returnQuery='',$perPage=10)
    {

        $query=$this->model->newQuery();
        if(count($realtions) > 0){
            foreach($realtions as $key=>$columns){
                $query=$query->with($key,function($q) use($columns){
                      $q->select($columns);
                });
            }
        }
        if(count($conditions) > 0){
            if(isset($conditions['whereHas']) && count($conditions['whereHas'])>0){
                foreach($conditions['whereHas'] as $key=>$condition){

                    if(is_array($condition)){
                        $query=$query->whereHas($key,function($q)use($condition){
                            $q->whereIn($condition['key'],$condition['parameters']);
                        });
                    }
                }
            }


            if(isset($conditions['whereLike']) && count($conditions['whereLike'])>0){
                foreach($conditions['whereLike'] as $key=>$parameters){

                    $query=$query->where($key, 'LIKE', "%{$parameters}%");
                }
            }

            if(isset($conditions['where']) && count($conditions['where'])>0){
                foreach($conditions['where'] as $key=>$condition){
                    $query=$query->where($key,$condition);
                }
            }
        }
        if($returnQuery =='paginate'){
            $data =$query->paginate($perPage);
        }else{
            $data = $query->get();
        }
        return $data;
    }


    /**
     * Update Or Create model record for given 2 arrays
     *
     * @param array $input
     * @param array $where
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function updateOrCreate($request, $id=null)
    {

        if($id==null){
            $model = $this->model->create($request->all());
        }else{
            $model=$this->model->find($id);

            $model->update($request->all());
        }
        $model->save();

        return $model;
    }

        /**
     * @param int $id
     *
     * @return bool|mixed|null
     * @throws \Exception
     *
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();
        $model = $query->findOrFail($id);
        if($model){
            return $model->delete();
        }else{
            return false;
        }
    }


}
