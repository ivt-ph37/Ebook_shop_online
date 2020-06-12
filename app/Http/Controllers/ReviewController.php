<?php

namespace App\Http\Controllers;

use App\Repositories\Review\ReviewRepositoryInterface;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $_reviewRepository;
    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->_reviewRepository = $reviewRepository;
    }

    public function index()
    {
        $result = $this->_reviewRepository->getAll();
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
    public function store(Request $request,$user_id)
    {


        try {

            $data = $request->only('content','rating','product_id') + ['user_id' => $user_id];

            $review =  $this->_reviewRepository->create($data);
            $result = array(
                'status' => 'OK',
                'message' => 'Insert Successfully',
                'data' => $review
            );
            return response()->json($result, Response::HTTP_CREATED, [], JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message' => 'Insert Failed',
                'data' => ''
            );
            return response()->json($result, Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_find = $this->_reviewRepository->find($id);

        if (is_null($data_find)){
            return response()->json("Record id not found",Response::HTTP_NOT_FOUND,[],JSON_NUMERIC_CHECK);
        }
        $result = array(
            'status' => 'OK',
            'message'=> 'Show Successfully',
            'data'=> $data_find
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function edit(Producer $producer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data_find = $this->_reviewRepository->find($id);
            if (is_null($data_find)){
                return response()->json("Record is not found",Response::HTTP_NOT_FOUND,[],JSON_NUMERIC_CHECK);
            }
            $data = $this->_reviewRepository->update($id,$request->only('content','rating','product_id','user_id'));
            $result = array(
                'status' => 'OK',
                'message'=> 'Update Successfully',
                'data'=> $data
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = $this->_reviewRepository->delete($id);
            $result = array(
                'status' => 'OK',
                'message'=> 'Delete Successfully',
                'data'=> $data
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Delete Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }
}
