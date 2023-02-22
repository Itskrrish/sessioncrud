<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Authenticatable
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id', 'user_id', 'game_title'];
    protected $table = 'games';

/**
 * The attributes that should be hidden for serialization.
 *
 * @var array<int, string>
 */


/**
 * The attributes that should be cast.
 *
 * @var array<string, string>
 */

}