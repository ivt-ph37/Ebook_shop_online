<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Post\UserInterface;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{


    protected $_userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        //$this->middleware('auth.role:Admin', ['except' => ['show']]);
        $this->_userRepository = $userRepository;
    }


    public function index(Request $request)
    {
        $paginate = $request->only('limit', 'page');
        if (count($paginate) > 0) {
            return response()->json($this->_userRepository->getUsers()->paginate($paginate['limit']), Response::HTTP_OK, [], JSON_NUMERIC_CHECK);
        }
        $result = $this->_userRepository->getUsers()->get();
        return response()->json(UserResource::collection($result), Response::HTTP_OK, [], JSON_NUMERIC_CHECK);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_exist = User::where('email',$request->get('email'))->get()->toArray();
        if (count($user_exist) > 0 ){
            return response()->json([
                'status' => 400,
                'message' => 'Email Exist',
                'data' => ''
            ],400);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
            'address_id' => 'required|numeric',
            'roles' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
        }

        $check = '';
        try {
            $data = $request->all();
            $user_add = $this->_userRepository->addUser($data);
            $result = array(
                'status' => "OK",
                'message' => 'Insert Successfully',
                'data' => $user_add
            );
            return response()->json($result, Response::HTTP_CREATED, [], JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => "ERR",
                'message' => 'Insert Failed',
                'data' => 'ERR'
            );
            return response()->json($result, Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data_find = $this->_userRepository->find($id);
        if (is_null($data_find)) {
            return response()->json("Record id not found", Response::HTTP_NOT_FOUND, [], JSON_NUMERIC_CHECK);
        }
        $result = array(
            'status' => 'OK',
            'message' => 'Show Successfully',
            'data' => $this->_userRepository->getUserById($id)
        );
        return response()->json($result, Response::HTTP_OK, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
            'address_id' => 'required|numeric',
            'roles' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
        }


        $check = '';
        try {
            $data_find = $this->_userRepository->find($id);
            if (is_null($data_find)) {
                return response()->json("Record is not found", Response::HTTP_NOT_FOUND, [], JSON_NUMERIC_CHECK);
            }
            $data = $request->only('name', 'phone_number', 'email', 'birthday', 'password', 'address', 'address_id', 'roles');
            $check = $this->_userRepository->updateUser($id, $data);
            $result = array(
                'status' => 'OK',
                'message' => 'Update Successfully',
                'data' => $check
            );
            return response()->json($result, Response::HTTP_OK, [], JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message' => 'Update Failed',
                'data' => 'ERR'
            );
            return response()->json($result, Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = '';
        try {
            $data_find = $this->_userRepository->find($id);
            if (is_null($data_find)) {
                return response()->json("Record is not found", Response::HTTP_NOT_FOUND, [], JSON_NUMERIC_CHECK);
            }
            $check = $this->_userRepository->deleteUser($id);
            $result = array(
                'status' => "OK",
                'message' => 'Delete Successfully',
                'data' => $data_find
            );
            return response()->json($result, Response::HTTP_OK, [], JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => "ERR",
                'message' => 'Delete Failed',
                'data' => 'ERR'
            );
            return response()->json($result, Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
        }
    }
}
