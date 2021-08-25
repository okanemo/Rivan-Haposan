<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DataRecord extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sub_categories_id','description','transaction'
    ];

    protected $hidden = [];

    public function sub_category(){
        return $this->belongsTo(SubCategory::class, 'sub_categories_id','id');
    }
}
