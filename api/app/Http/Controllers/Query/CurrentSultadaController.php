<?php

namespace App\Http\Controllers\Query;

use Carbon\Carbon;
use App\Models\Bet;
use App\Models\BranchRecord;
use App\Models\EventSultada;
use Illuminate\Http\Request;
use App\Models\CurrentSultada;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CurrentSultadaController extends Controller
{

    public function getCurrentSltd($cur_id) {
        $currentSultada = DB::table('current_odds_view')
                        ->addSelect(['sum_meron' => Bet::select(DB::raw('sum(bet_amt)'))
                            ->whereColumn('sltd_no', 'current_odds_view.sltd')
                            ->where('bet_side', 'MERON')
                        ])
                        ->addSelect(['sum_wala' => Bet::select(DB::raw('sum(bet_amt)'))
                            ->whereColumn('sltd_no', 'current_odds_view.sltd')
                            ->where('bet_side', 'WALA')
                        ])
                        ->where('sltd_branch', '=', $cur_id)
                        ->first();
                        
        return $currentSultada;
    }

    public function getResult($sltd) {

        $result = EventSultada::select('no_stld', 'sltd_number', 'sltd_res')
                                ->where('no_stld', $sltd)->first();
        return $result;
    }

    public function getNextSultada(Request $request) {

        $query = CurrentSultada::where('sltd_branch', '=', $request->branch)
                                ->first();

        $query->update(array('odds_sltd' => $query->sltd));

        return $query;

    }

    public function addBet(Request $request) {

        $query = Bet::create([
            'sltd_no' => $request->odds_sltd,
            'bet_amt' => $request->bet_amt,
            'bet_plasada' => $request->bet_plasada,
            'bet_side' => $request->bet_side,
            'bet_dt' => Carbon::now(),
            'win_stat' => 'NR',
            'win_claim' => 'N',
            'bet_stat' => 'UC',
            'bet_branch' => $request->branch_id,
            'bet_pc' => $request->bet_pc,
            'sltd_odds' => $request->sltd_odds,
        ]);

        return 'Bet ticket successfully added';
    }

    public function getSample() {
        return Session::all();
    }
    
    public function getUser(Request $request) {
        // $data = $request->input();

        session(['key' => 'value']);
        
    }

    public function getUserEmail() {
        $data = Session::all();

        return $data;
    }
}
