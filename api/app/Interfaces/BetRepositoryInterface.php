<?php
namespace App\Interfaces;

interface BetRepositoryInterface 
{
    public function getTicket($id);
    public function createBet($data);
}