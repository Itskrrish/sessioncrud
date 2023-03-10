<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name',];

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