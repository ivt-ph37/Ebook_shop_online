<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
      //  $this->middleware('cors');
    }

    public function validate($request)
    {
        $validator = Validator::make($request->all(), [], []);
        if ($validator->fails())
        {
            return \response()->json($validator->errors());
        }
    }

}

