<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ListTodo
 * @package App
 *
 * @property-read $id
 * @property $title
 * @property-read $user_id
 */
class ListTodo extends Model
{
    protected $fillable = [
        'title', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function todo() {
        return $this->hasMany(Todo::class);
    }

    public function todosByStatus()
    {
        $todos = [];
        for ($i = 1; $i <= 3; $i++)
        {
            $todos[] = $this->todo()->where('status', '=', $i)->getResults();
        }
        return $todos;
    }
}
