<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getReadingTime()
    {
        $minutes = round(str_word_count(strip_tags($this->body)) / 250);
        return ($minutes == 0) ? 1 : $minutes;
    }
}
