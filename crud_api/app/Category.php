<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    static public $rules_post = [
        'name' => 'required|string|max:255',
    ];

    public function persons()
    {
        return $this->hasMany(Person::class, 'categories_id');
    }
}
