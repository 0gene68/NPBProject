<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampionYear extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     * 
     * @var string
     */
    protected $primaryKey = 'championYear';


    public function team() {
        return $this->belongsTo(Team::class, 'team_id', 'team_id');
    }
}
