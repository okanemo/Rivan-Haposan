<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SubCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'categories_id','title'
    ];

    protected $hidden = [];

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id','id');
    }

    public function datarecords(){
        return $this->hasMany(DataRecord::class, 'sub_categories_id', 'id');
    }
}
