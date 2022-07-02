<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    protected $table = 'tbl_bet_sltd';

    protected $primaryKey = 'no_bet';

    public $timestamps = false;

    protected $fillable = [
        'sltd_no',
        'bet_amt',
        'bet_plasada',
        'bet_side',
        'bet_dt',
        'win_stat',
        'win_claim',
        'bet_branch',
        'claim_dt',
        'bet_stat',
        'bet_pc',
        'claim_pc',
        'sltd_odds'
    ];


}
