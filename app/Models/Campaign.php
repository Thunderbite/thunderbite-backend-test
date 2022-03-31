<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'timezone', 'name', 'slug', 'start_date', 'end_date',
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('timezone', 'like', '%'.$query.'%')
                ->orWhere('starts_at', 'like', '%'.$query.'%')
                ->orWhere('ends_at', 'like', '%'.$query.'%');
    }
}
