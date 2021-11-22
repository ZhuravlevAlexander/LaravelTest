<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'name', 'email', 'body',
    ];

    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }

}
