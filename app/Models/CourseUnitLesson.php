<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class CourseUnitLesson extends Model
{
    protected $fillable = ['unit_id', 'video_url', 'title', 'content', 'duration'];

      protected function videoUrl(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!$value) return null;

                parse_str(parse_url($value, PHP_URL_QUERY), $query);

                if (isset($query['v'])) {
                    return "https://www.youtube.com/embed/{$query['v']}";
                }

                return null;
            }
        );
    }
}
