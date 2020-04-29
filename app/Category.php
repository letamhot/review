<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';

    public function book()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
}
