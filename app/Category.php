<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];

    protected $fillable =[
        'name','photo','parrent_id'
    ];


    public function categories()
    {
        return $this->hasMany(Category::class,'parrent_id');
    }


    public function products(){
        return $this->hasMany(Product::class);
    }


    public function childrenCategories()
    {
        return $this->hasMany(Category::class,'parrent_id')->with('categories');
    }
}
