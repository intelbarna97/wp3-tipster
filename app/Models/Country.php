<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function leagues()
    {
        return $this->hasMany(League::class);
    }
}
