<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService) 
    {
        $this->productService = $productService;
    }

    public function show()
    {
        return $this->productService->show();
    }

    public function register(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'description' => 'required|string|max:256',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->productService->register($validatedData->validated());
    
            return $result;
        }
    }

    public function delete($id)
    {
        $result = $this->productService->delete($id);

        return $result;
    }

    public function update(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'description' => 'required|string|max:256',
            'id' => 'required|integer',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->productService->update($validatedData->validated());

            return $result;
        }
    }
}
