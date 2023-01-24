<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slots extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slotC1',
        'SlotC2',
    ];


    protected $table = 'Slots';
}