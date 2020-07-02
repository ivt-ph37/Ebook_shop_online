<?php

namespace App\Http\Controllers;
use App\Jobs\SendEmailJob;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Redirect,DB,Config;
use Mail;

use App\Mail\MailNotify;
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
        $this->middleware('auth.role:Admin,Nhân Viên',['except' => ['store','getOrderByUser','destroy']]);
        $this->_orderRepository = $orderRepository;
    }


    public function index(Request $request)
    {
        $paginate = $request->only('limit', 'page');
        if (count($paginate) > 0) {
            return response()->json($this->_orderRepository->getOrders()->paginate($paginate['limit']));
        }
        return response()->json($this->_orderRepository->getOrders()->get());
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
        $validator = Validator::make($request->all(), [
            'cart' => 'required',
            'transaction_info' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
        }

        $transaction_info = $request->only('transaction_info')["transaction_info"];
        $cart = $request->only('cart')["cart"];


        try{

            $this->_orderRepository->submitOrder($cart,$transaction_info);
            $result = array(
                'status' => 'OK',
                'message'=> 'Insert Successfully',
                'data'=> $cart,$transaction_info
            );
            if (isset($transaction_info['user_id'])) {
                $newCart = [];
                foreach ($cart as $item) {
                    $newItem = $item;
                    $newItem['name'] = Product::find($item['product_id'])->name;
                    $newItem['photo'] = Product::find($item['product_id'])->photo;
                    $newCart[] = $newItem;
                }
                dispatch(new SendEmailJob($transaction_info, $newCart, User::find($transaction_info['user_id'])->email));
                //  Mail::to(User::find($transaction_info['user_id'])->email)->send(new MailNotify($transaction_info,$cart));
            }
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
    public function show($id)
    {
        return response()->json($this->_orderRepository->getProductOfOrder($id), Response::HTTP_OK, [], JSON_NUMERIC_CHECK);

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
                'data'=> $this->_orderRepository->getOrderById($transaction_id)
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

            if ($data_find['status_id'] != 1) {
                return response()->json("Order is processing , not allowed to delete", Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
            }

            if (is_null($data_find)) {
                return response()->json("Record is not found", Response::HTTP_NOT_FOUND, [], JSON_NUMERIC_CHECK);
            }
            $data = $this->_orderRepository->update($transaction_id, ['status_id' => 5]);
            $result = array(
                'status' => 'OK',
                'message' => 'Update Successfully',
                'data' => $this->_orderRepository->getOrderById($transaction_id)
            );
            return response()->json($result, Response::HTTP_OK, [], JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message' => 'Update Failed',
                'data' => ''
            );
            return response()->json($result, Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
        }
    }
}
