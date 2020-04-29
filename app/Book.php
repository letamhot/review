<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
