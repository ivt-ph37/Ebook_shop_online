<?php

namespace App\Http\Controllers;

use App\PhotoArray;
use App\Repositories\PhotoArray\PhotoArrayRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PhotoArrayController extends Controller
{
    private $_photoRepository;

    public function __construct(PhotoArrayRepositoryInterface $photoArrayRepository)
    {
        $this->_photoRepository = $photoArrayRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $file_format = $file->getClientOriginalExtension();
                if ($file_format != "jpg" && $file_format != "png" && $file_format != "jpeg") {
                    return response()->json(['content' => 'Format File Not Accept', "error" => true], 400);
                }
                $name = str_random(4) . "_" . $file->getClientOriginalName();
                $file->move("upload/product", $name);

            } else {
                return response()->json(['content' => 'Please Choose File', "error" => true], 400);
            }
            $data = $request->only('product_id') + ['photo' => $name];
            $product = $this->_photoRepository->create($data);
            $result = array(
                'status' => 'OK',
                'message' => 'Insert Successfully',
                'data' => $product
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
     * @param \App\PhotoArray $photoArray
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoArray $photoArray)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\PhotoArray $photoArray
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoArray $photoArray)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\PhotoArray $photoArray
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoArray $photoArray)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\PhotoArray $photoArray
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoArray $photoArray)
    {
        //
    }
}
