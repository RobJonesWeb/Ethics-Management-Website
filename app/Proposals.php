<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposals extends Model
{
    protected $table = 'proposals';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'author_id', 'title', 'file_address', 'user_level', 'status_id', 'supervisor_id'
];

}