<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use Sluggable;

    protected $fillable = ['session_id','user_id','title', 'slug'];
     /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                // optional: 'onUpdate' => true, to regenerate when title changes
                // optional: 'separator' => '-', 'maxLength' => 50, ...
            ]
        ];
    }

}
