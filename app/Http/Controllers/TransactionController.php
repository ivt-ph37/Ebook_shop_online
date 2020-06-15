<?php

namespace App\Http\Controllers;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    private $_orderRepository;
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->_orderRepository = $orderRepository;
    }


    public function index()
    {
        $result = $this->_orderRepository->getOrders();
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
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
        $transaction_info = $request->only('transaction_info')["transaction_info"];
        $cart = $request->only('cart')["cart"];
        try{
            //  $cart = $request->only('cart');
            //  $cart = json_decode($cart['cart']);
            //$cart = json_decode($cart);

            //$transaction_info = ['Thi Nhan',4,'123 Nguyen Luong Bang',2,1];

            $this->_orderRepository->submitOrder($cart,$transaction_info);
            $result = array(
                'status' => 'OK',
                'message'=> 'Insert Successfully',
                'data'=> $cart,$transaction_info
            );
            return response()->json($result,Response::HTTP_CREATED,[],JSON_NUMERIC_CHECK);
        }catch (Exception $e){
            $result = array(
                'status' => 'ER',
                'message'=> 'Insert Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $transaction_id)
    {
        try {
            $data_find = $this->_orderRepository->find($transaction_id);
            if (is_null($data_find)){
                return response()->json("Record is not found",Response::HTTP_NOT_FOUND,[],JSON_NUMERIC_CHECK);
            }
            $this->_orderRepository->update($transaction_id,$request->only('status_id'));
            $result = array(
                'status' => 'OK',
                'message'=> 'Update Successfully',
                'data'=> $data_find
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Update Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }

    public function getOrderByUser($user_id){
        $find_user = User::find($user_id);
        if (is_null($find_user)){
            return response()->json("Record id not found",Response::HTTP_NOT_FOUND,[],JSON_NUMERIC_CHECK);
        }
        $data_find = $this->_orderRepository->getOrderByUser($user_id);
        $result = array(
            'status' => 'OK',
            'message'=> 'Show Successfully',
            'data'=> $data_find
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction, $transaction_id)
    {
        try {
            $data_find = $this->_orderRepository->find($transaction_id);
            if (is_null($data_find)){
                return response()->json("Record is not found",Response::HTTP_NOT_FOUND,[],JSON_NUMERIC_CHECK);
            }
            $this->_orderRepository->update($transaction_id,['status_id' => 5]);
            $result = array(
                'status' => 'OK',
                'message'=> 'Update Successfully',
                'data'=> $data_find
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Update Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }
}
