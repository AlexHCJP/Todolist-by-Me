<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Todo
 * @package App
 *
 * @property-read $id
 * @property $title
 * @property $status
 * @property-read $list_todo_id
 *
 */
class Todo extends Model
{
    protected $fillable = [
        'title', 'list_todo_id', 'status',
    ];
    public function listTodo(){
        return $this->belongsTo(ListTodo::class);
    }
}
