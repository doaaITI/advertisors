<?php

namespace App\Http\Repositories;

use App\Models\Category;
use App\Models\Tag;
use App\Http\Repositories\BaseRepository;
use Illuminate\Http\Request;

class TagRepository  extends BaseRepository
{

      /**
     * index [Use index to get data from model]
     *
     * @param  Request $request
     * @param  Int $id
     * @return Boolean
     */
    public function getTags(Request $request,$where=[],$realtions=[],$returnQuery='',$perPage=10){
        return $this->index($request,[],[],'paginate',10);
      }
      /**
       * save [Use save data into Model]
       *
       * @param  Request $request
       * @param  Int $id
       * @return Boolean
       */
      public function save(Request $request, int $id = null)
      {
          if($id==null){
           
              $model = $this->updateOrCreate($request);
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
      public function deleteTag( $id = null)
      {
          return $this->delete($id);
      }



    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tag::class;
    }

}
