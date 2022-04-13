<?php

namespace App\Http\Controllers\Query;

use App\Models\Bet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CurrentSultadaController extends Controller
{

    public function getCurrentSltd($cur_id) {
        $currentSultada = DB::table('current_odds_view2')
                        ->addSelect(['sum_meron' => Bet::select(DB::raw('sum(bet_amt)'))
                            ->whereColumn('sltd_no', 'current_odds_view2.sltd')
                            ->where('bet_side', 'MERON')
                        ])
                        ->addSelect(['sum_wala' => Bet::select(DB::raw('sum(bet_amt)'))
                            ->whereColumn('sltd_no', 'current_odds_view2.sltd')
                            ->where('bet_side', 'WALA')
                        ])
                        ->where('sltd_branch', '=', $cur_id)
                        ->get();
                        
        return $currentSultada;
    }
}
