<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Category extends Model
{

    use Sluggable, SearchableTrait;

    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $searchable = [
        'columns'   => [
            'categories.name'       => 10,
            'categories.slug'       => 10,
        ],
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function status()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }

}
