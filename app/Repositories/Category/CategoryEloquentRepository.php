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

    public function getAllCategory(){
        return DB::table('categories')->select('categories.*');
    }

    public function getSubCategories()
    {
        $categories = DB::table('categories as c1')
            ->join('categories as c2','c2.parrent_id','=','c1.id')
            ->join('categories as c3','c3.parrent_id','=','c2.id')
            ->select('c3.id as id','c3.name as name')
            ->where('c1.parrent_id','=',null)
            ->get();

        return $categories;
    }
}
