<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::paginate(15);
        return response()->json($products);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::find($id);
        if (!empty($product))
        {
            return response()->json($product);
        }
        else
        {
            return response()->json([
                "message" => "Product not found"
            ],404);
        }
    }

    public function destroy($id): JsonResponse
    {
        $product=Product::find($id);

        if (!empty($product)) {

            $product->delete();

            return response()->json([
                "message" => "Product deleted."
            ], 202);
        }
        else
        {
            return response()->json([
                "message" => "User not found."
            ], 404);
        }
    }

    public function import(Request $request): JsonResponse
    {
        try {
            $data = $request->toArray();
            $validator = Validator::make($data,[
                'title' => 'required|unique:product',
                'description' => 'required',
                'price' => 'required',
                'rating' => 'required',
                'stock' => 'required',
                'brand' => 'required',
                'category' => 'required'
            ],
                [
                    'required' => 'Parameters are wrong',
                    'unique' => 'Record Already exists'
                ]);

            if ($validator->fails()){

                return response()->json($validator->errors()->getMessages(),status: 400);
            }else{
                $product = new Product($validator->validated());
                $product->save();
                return response()->json([
                    "message" => "Successfully Uploaded."
                ], 200);
            }
        }catch(Exception $exception){
            return response()->json([
                "message" => "$exception"
            ], 500);
        }



    }
}
