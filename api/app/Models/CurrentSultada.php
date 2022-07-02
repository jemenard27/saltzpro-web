<?php

namespace App\Models;

use App\Models\EventSultada;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrentSultada extends Model
{
    use HasFactory;

    protected $table = 'tbl_cur_sltd';

    protected $fillable = [
        'odds_sltd'
    ];

    protected $primaryKey = 'no_cur';

    public $timestamps = false;

}
