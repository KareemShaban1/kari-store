<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ProductsController extends Controller
{

    use ApiResponseTrait;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        // with (relationship:fields)
        $products = Product::filter($request->query())
            ->with('category:id,name', 'store:id,name', 'tags:id,name')
            ->paginate();

        $products_collection = ProductResource::collection($products);

        return $this->apiResponse($products_collection, 'All Products', 200);


        // return Product::filter($request->query())

        //     //// return relations that associated with product model
        //     // ->with('category','store','tags')

        //     //// we can identify specific columns for each table
        //     ->with('category:id,name','store:id,name','tags:id,name')

        //     ->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'in:active,inactive',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|gt:price',
        ]);

        $user = $request->user();
        if ($user->tokenCan('products.create')) {
            abort(403, 'Not Allowed');
            
        }

        $product = Product::create($request->all());

        return $this->apiResponse(new ProductResource($product), 'Product Stored Successfully', 200);



        // return Response::json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        /*
            return new ProductResource($product);

            return $product
                return relation that related with product object in json format
                ->load('category:id,name', 'store:id,name', 'tags:id,name');
        */

        try {
        return $this->apiResponse(new ProductResource($product), 'Product', 200);
        }catch(ModelNotFoundException $e) {
            return response()->json(['message' => 'Product not found'], 404);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,id',
            'status' => 'in:active,inactive',
            'price' => 'sometimes|required|numeric|min:0',
            'compare_price' => 'nullable|numeric|gt:price',
        ]);
        $user = $request->user();
        if (!$user->tokenCan('products.update')) {
            // abort(403, 'Not Allowed');
            return response()->json([
                'message'=>'Not Allowed'
            ]);
        }

        $product->update($request->all());


        return $this->apiResponse(new ProductResource($product), 'Product Updated Successfully', 200);

        // return Response::json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        // sanctum guard responsible for api
        $user = Auth::guard('sanctum')->user();
        if (!$user->tokenCan('products.delete')) {
            return response([
                'message' => 'Not Allowed'
            ], 403);
        }
        Product::destroy($id);

        return response()->json([
            'message' => 'Product Deleted Successfully'
        ], 200);
    }
}