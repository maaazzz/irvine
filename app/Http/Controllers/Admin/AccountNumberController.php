<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AccountNumber;
use Illuminate\Http\Request;

class AccountNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account_numbers = AccountNumber::all();
        return view('admin.account-number-mgt.account-numbers', compact('account_numbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'account_no' => 'required',
        ]);

        AccountNumber::create(
            [
                'account_no' => $request->account_no,
            ]
        );
        return back()
            ->with('success', 'Account number created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AccountNumber  $accountNumber
     * @return \Illuminate\Http\Response
     */
    public function show(AccountNumber $accountNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AccountNumber  $accountNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountNumber $accountNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AccountNumber  $accountNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountNumber $accountNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AccountNumber  $accountNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountNumber $accountNumber)
    {
        //
    }
}