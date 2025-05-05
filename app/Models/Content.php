<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title', 'description', 'url', 'category_id', 'path_file'];

    public function category(){
        return $this->belongsTo('\App\Models\Category');
    }
}
