<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'due_date',
        'status',
        'resource_type_id',
        'team_id'
    ];
}
