<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserScore extends Authenticatable
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'game_id', 'score'];
    protected $table = 'UseScore';

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