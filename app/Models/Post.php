<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        // search 
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        });

        // category
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas(
                'category',
                function ($query) use ($category) {
                    $query->where('slug', $category);
                }
            );
        });

        $query->when($filters['auther'] ?? false, function ($query, $auther) {
            $query->whereHas(
                'user',
                function ($query) use ($auther) {
                    $query->where('name', $auther);
                }
            );
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
