<?php


namespace App\Repositories\Report;


use App\Repositories\EloquentRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\App;
use DB;

class ReportEloquentRepository implements ReportRepositoryInterface
{
    public function getTranSactionStatus($month)
    {
        $rs1 =  DB::table('transactions as t')
            ->leftJoin('transaction_products','t.id','=','transaction_products.transaction_id')
            ->leftJoin('transaction_statuses','t.status_id','=','transaction_statuses.id')
            ->select(DB::raw('SUM(transaction_products.price * transaction_products.amount) as money_total'),
                'transaction_statuses.name as status')
            ->where(DB::raw('MONTH(t.updated_at)'),$month)
            ->groupBy('transaction_statuses.name')
            ->get();
        $rs2  =  DB::table('transactions as t')
            ->leftJoin('transaction_statuses','t.status_id','=','transaction_statuses.id')
            ->select(DB::raw('COUNT(transaction_statuses.name) as number_order'),'transaction_statuses.name')
            ->where(DB::raw('MONTH(t.updated_at)'),$month)
            ->groupBy('transaction_statuses.name')
            ->get();

        return [$rs1,$rs2];

    }






}
