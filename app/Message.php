<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public $timestamps = false;

    protected $dates = ['creeated_at', 'read_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'from_id', 'to_id', 'creeated_at', 'read_at'
    ];


    public function from ()
    {
        return $this->belongsTo(User::class, 'from_id');
    }
}
