<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $table= 'bookmark';
    protected $primaryKey= 'id';
    protected $fillable=[
        'user_id', 'word'
    ];
}
