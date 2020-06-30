<?php

namespace App\Http\Controllers;

use App\Repositories\Report\ReportRepositoryInterface;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function index(Request $request)
    {
        $month = $request->only('month');
        return response()->json($this->reportRepository->getTranSactionStatus($month['month']));
    }

    //
}
