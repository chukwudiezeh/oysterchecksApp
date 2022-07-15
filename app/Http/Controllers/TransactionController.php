<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Transaction};

class TransactionController extends Controller
{
    

    public function getTransactions()
    {

    }

    public function getTransaction(Transaction $transaction)
    {
        return view('users.accounts.transaction', ['transaction'=>$transaction]);
    }

    public function updateTransaction()
    {

    }
}
