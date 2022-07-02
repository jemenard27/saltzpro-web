<?php
namespace App\Repositories;

use App\Models\Bet;
use App\Models\BranchName;
use App\Interfaces\BetRepositoryInterface;

class BetRepository implements BetRepositoryInterface 
{

    public $model;

    public function __construct(Bet $model) {
        $this->model = $model;
    }
    public function getTicket($id) {
        return $this->model->all()->limit('5');
    }

    public function createBet($bet) {
        $id = $this->model->insertGetId([
                'bet_amt' => $bet->bet_amt,
                'bet_plasada' => $bet->bet_plasada
        ]);
        return $id;
    }
}