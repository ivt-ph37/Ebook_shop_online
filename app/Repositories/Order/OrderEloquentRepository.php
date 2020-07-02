<?php


namespace App\Repositories\Order;


use App\Repositories\EloquentRepository;

use App\Transaction;
use DB;

class OrderEloquentRepository extends EloquentRepository implements OrderRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Transaction::class;
    }

    public function getOrders()
    {
        return DB::table('transactions as t')
            ->leftJoin('users','t.user_id','=','users.id')
            ->leftJoin('transaction_products','t.id','=','transaction_products.transaction_id')
            ->leftJoin('addresses','t.address_id','=','addresses.id')
            ->leftJoin('transaction_statuses','t.status_id','=','transaction_statuses.id')
            ->select('t.id','t.user_id','t.full_name',
                't.street','addresses.name as city','users.phone_number','users.name',
                DB::raw('SUM(transaction_products.price * transaction_products.amount) as total')
                , 'transaction_statuses.name as status')
            ->groupBy('t.id');
    }

    public function submitOrder($cart,$transaction_info){
        //$cart = '[{"product_id" : 1, "amount" : 3, "price" : 4, "tracsaction_id" : 2 }]';
        // transactioninfo = 'full_name', 'user_id',street,address_id,status_id,
        // ['Thi Nhan',4,'123 Nguyen Luong Bang',2,1],

        $check = false;
        try{
            DB::beginTransaction();
            // create an transaction
            $transaction = Transaction::create($transaction_info);

            foreach ($cart as $item) {
                DB::table('transaction_products')->insert(
                    [
                        'product_id' => $item['product_id'],
                        'amount' => $item['amount'],
                        'price' => $item['price'],
                        'transaction_id' =>$transaction['id']
                    ]
                );
            }
            DB::commit();
            $check = true;
        }catch (Exception $ex){
            DB::rollback();
            return $check;
        }
        return $check;
    }


    public function getOrderByUser($user_id)
    {
        $trans = Transaction::where('user_id', $user_id)->pluck('id')->toArray();
        $bigdata = collect();
        foreach ($trans as $tran) {
            $data = collect();
            $tracsaction = Transaction::find($tran);
            $status = DB::table('transactions as t')
                ->join('transaction_statuses','transaction_statuses.id','=','t.status_id')
                ->where('t.id',$tran)
                ->select('transaction_statuses.name as status')
                ->get();
            $status = collect($status);
            $data = $data->concat($tracsaction->products)->concat($status);

            $bigdata = $bigdata->add($data);
        }
        return $bigdata;
    }

    public function getOrderById($id)
    {
        return DB::table('transactions as t')
            ->leftJoin('users','t.user_id','=','users.id')
            ->leftJoin('transaction_products','t.id','=','transaction_products.transaction_id')
            ->leftJoin('addresses','t.address_id','=','addresses.id')
            ->leftJoin('transaction_statuses','t.status_id','=','transaction_statuses.id')
            ->select('t.id','t.user_id','t.full_name',
                't.street','addresses.name as city','users.phone_number','users.name',
                DB::raw('SUM(transaction_products.price * transaction_products.amount) as total')
                , 'transaction_statuses.name as status')
            ->groupBy('t.id')
            ->having('t.id',$id)
            ->get();
    }

    public function getProductOfOrder($id){
        $order = Transaction::find($id);
        return $order->products;
    }
}
