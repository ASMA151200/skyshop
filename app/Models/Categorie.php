<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['nom_categorie','desc_categorie'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    //
}