<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/products",
     *     operationId="listProducts",
     *     tags={"Products"},
     *     summary="List all products",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *     ),
     * )
     */

    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        return response()->json($product);
    }

    public function create(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return response()->json(['message' => 'Produto criado com sucesso'], 201);
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return response()->json(['message' => 'Produto atualizado com sucesso']);
    }
}


