<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Check if post have tags
     * @return bool
     */

    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray()); //pluck is used on collection(tags) not eloquent (tags())
    }

    public function deleteImage(){
        Storage::delete($this->image);
    }
}
