<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'contents',
        'image',
    ];
    public function postImage()
    {
        return ($this->image) ? 'storage/'.$this->image : 'storage/uploads/brak-zdjecia.png';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('reply_id', null)->latest();
    }
    public function countComments()
    {
        return $this->hasMany(Comment::class)->count();
    }
}