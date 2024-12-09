<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_question extends Model
{
    protected $table = 'table_questions';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'type_message',
        'message',
    ];

    protected $hidden = [
        'name',
        'email',
        'phone',
    ];
}
