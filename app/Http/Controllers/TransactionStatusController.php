<?php

namespace App\Http\Controllers;

use App\Repositories\OrderStatus\OrderStatusRepositoryInterface;
use App\TransactionStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $_orderStatusRepository;

    public function __construct(OrderStatusRepositoryInterface $orderStatusRepository)
    {
        $this->_orderStatusRepository = $orderStatusRepository;
    }

    public function index(){
        $result = $this->_orderStatusRepository->getAll();
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionStatus  $transactionStatus
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionStatus $transactionStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionStatus  $transactionStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionStatus $transactionStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionStatus  $transactionStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionStatus $transactionStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionStatus  $transactionStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionStatus $transactionStatus)
    {
        //
    }
}
