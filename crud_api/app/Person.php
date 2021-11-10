<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    protected $fillable = [
        'name',
        'email',
        'categories_id',
    ];

    static public $rules_post = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:75|email',
    ];


    public function categories()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
