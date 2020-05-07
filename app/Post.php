<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Storage;

class Post extends Model
{

    use softDeletes;

    protected $dates = [
        'published_at'
    ];

    protected $fillable = [

        'title',
        'description',
        'content',
        'image',
        'published_at',
        'category_id',
        'user_id'

    ];

    /**
     * 
     * @return void
     * 
    */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // A post can only have one category
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class); // A post can have many tags
    }

    public function user()
    {
        return  $this->belongsTo(User::class); // A post can only have one user
    }

    public function hasTag($tagId) //This only picks id in an array instead of an array of objects
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopeSearched($query) //Laravel Query Scope
    {
        $search = request()->query('search');

        if (!$search)
        {
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%{$search}%");
    }
}
