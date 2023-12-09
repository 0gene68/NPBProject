<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     * 
     * @var string
     */
    protected $primaryKey = 'team_id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'team_id' => 'string',
    ];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    public function championYears() {
        return $this->hasMany(ChampionYear::class, 'team_id', 'team_id');
    }

}
