<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'league_id',
        'team1_id',
        'team2_id',
        'team1_goals',
        'team2_goals',
        'result',
    ];

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function team1()
    {
        return $this->belongsTo(Team::class,'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class,'team2_id');
    }

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }
}
