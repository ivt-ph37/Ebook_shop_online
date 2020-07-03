<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $_productRepository;


    private $_categoryRepository;
    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
   //     $this->middleware('auth.role:Admin', ['except' => ['index', 'show', 'filterProduct', 'getPhotosOfProduct', 'getProductReview', 'getProductByCategory']]);

        $this->_categoryRepository = $categoryRepository;
        $this->_productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $paginate = $request->only('limit', 'page');
        if (count($paginate) > 0) {
            return response()->json($this->_productRepository->getProducts()->paginate($paginate['limit']));
        }
        return response()->json($this->_productRepository->getProducts()->get());
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

        $validator = Validator::make($request->all(), [
            'photo' => 'required',
            'name' => 'required',
            'description' => 'required',
            'information' => 'required',
            'discount' => 'required|numeric|min:0|max:99',
            'amount' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'producer_id' => 'required|numeric',
            'status_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), Response::HTTP_BAD_REQUEST, [], JSON_NUMERIC_CHECK);
        }


        try{
            if ($request->hasFile('photo')){
                $file = $request->file('photo');
                $file_format = $file->getClientOriginalExtension();
                if ($file_format != "jpg" && $file_format != "png" && $file_format != "jpeg"){
                    return  response()->json(['content'=>'Format File Not Accept',"error"=>true],400);
                }
                $name=str_random(4)."_".$file->getClientOriginalName();
                $file->move("upload/product",$name);

            }   else {
                return  response()->json(['content'=>'Please Choose File',"error"=>true],400);
            }
            $data = $request->only('name','description','information','amount','price','discount','category_id','producer_id','status_id')+['photo' => $name];
            $product =   $this->_productRepository->create($data);
            $result = array(
                'status' => 'OK',
                'message'=> 'Insert Successfully',
                'data'=> $product
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data_find = $this->_productRepository->find($id);
        if (is_null($data_find)){
            return response()->json("Record id not found",Response::HTTP_NOT_FOUND,[],JSON_NUMERIC_CHECK);
        }

        $result = array(
            'status' => 'OK',
            'message'=> 'Show Successfully',
            'data'=> $this->_productRepository->showProductById($id)
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            if ($request->hasFile('photo')){
                $file = $request->file('photo');
                $file_format = $file->getClientOriginalExtension();
                if ($file_format != "jpg" && $file_format != "png" && $file_format != "jpeg"){
                    return  response()->json(['content'=>'Format File Not Accept',"error"=>true],400);
                }
                $name=str_random(4)."_".$file->getClientOriginalName();
                $file->move("upload/product",$name);

            }   else {
                return  response()->json(['content'=>'Please Choose File',"error"=>true],400);
            }
            $data = $request->only('name','description','information','amount','price','discount','information','category_id','producer_id','status_id')+['photo' => $name];
            $product =   $this->_productRepository->update($id,$data);
            $result = array(
                'status' => 'OK',
                'message'=> 'Updated Successfully',
                'data'=> $product
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        }catch (Exception $e){
            $result = array(
                'status' => 'ER',
                'message'=> 'Updated Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pr =  $this->_productRepository->delete($id);
            $result = array(
                'status' => 'OK',
                'message'=> 'Delete Successfully',
                'data'=> $pr
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

    public function getPhotosOfProduct($id)
    {
        return response()->json($this->_productRepository->getPhotosOfProduct($id), 200);
    }

    public function getProductByCategory(Request $request,$cat){
        $data_find = $this->_categoryRepository->find($cat);
        if (is_null($data_find)){
            return response()->json("Record id not found",Response::HTTP_NOT_FOUND,[],JSON_NUMERIC_CHECK);
        }
        $result = array(
            'status' => 'OK',
            'message'=> 'Show Successfully',
            'data'=> $this->_productRepository->getProductByCategory($cat)
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }

    public function getProductReview($id)
    {

        return response()->json($this->_productRepository->getReviewProduct($id));
    }

    public function searchProductByName(Request $request){
        $keyword = $request->get('keyword');
        return response()->json($this->_productRepository->searchProductByName($keyword),Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }

    public function filterProduct(Request $request)
    {

        $query = $this->_productRepository->query();



        if ($request->has('category')) {
            if (is_null($request->get('category')) == false) {
                $id = $request->get('category');
                $query->where('categories.id', $id)->orWhere('categories.parrent_id', $id);
            }
        }

        if ($request->has('producer')) {
            if (is_null($request->get('producer')) == false) {
                $query->where('producers.id', $request->get('producer'));
            }
        }

        if ($request->has('keyword')) {
            if (is_null($request->get('keyword')) == false) {
                $query->where('p.name', 'LIKE', '%' . $request->get('keyword') . '%');
            }
        }

        if ($request->has('price')) {
            if (is_null($request->get('price')) == false) {
                $price = explode(",", $request->get('price'));
                if (count($price) != 0) {
                    $query->where('price', '>=', $price[0])->where('price', '<=', $price[1]);
                }
            }
        }



        if ($request->has('sort')) {
            if (is_null($request->get('sort')) == false) {
                $query->orderBy('price',$request->get('sort'));
            }
        }

        if ($request->has('limit') && $request->has('page')) {
            $paginate = $request->only('limit', 'page');
            if (count($paginate) > 0) {
                return response()->json($query->groupBy('p.id')->paginate($paginate['limit']));
            }
        }



        return response()->json($query->groupBy('p.id')->get());

    }


}
