<?php


namespace App\Repositories\Category;


use App\Category;
use App\Repositories\EloquentRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
       return \App\Category::class;
    }

    public function getCategories()
    {
      //  \DB::connection()->enableQueryLog();
        return Category::where('parrent_id',null)->with('childrenCategories')->select('id','name','photo','parrent_id')->get();
      //  dd($query = \DB::getQueryLog());
    }
}
