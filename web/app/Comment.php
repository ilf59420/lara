<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    const UPDATED_AT = null;
    protected $fillable = [
        'account','content'
    ];
}
