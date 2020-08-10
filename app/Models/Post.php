<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'post_status', 'created_user_id', 'updated_user_id', 'deleted_user_id', 'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'create_user_id');
    }
}
