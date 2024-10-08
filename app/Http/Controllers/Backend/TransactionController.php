<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::latest()->paginate(10);

        return view('backend.transaction.index', [
            'transactions' => $transactions
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        return view('backend.transaction.show', [
            'transaction' => Transaction::where('uuid', $uuid)->firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
