<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Flag;

class ProductService
{
    protected $productModel;

    public function __construct(Product $productModel) 
    {
        $this->productModel = $productModel;
    }

    public function show() 
    {
        return $this->productModel->all();
    }

    public function register(array $data)
    {
        $result = $this->productModel::firstOrCreate($data);

        if ($result->wasRecentlyCreated) 
        {
            return response()->json([
                'message' => 'Registro criado com sucesso!',
                'data' => $result
            ], 201);
        } 
        else 
        {
            return response()->json([
                'message' => 'Registro já existia no banco.',
                'data' => $result
            ], 200);
        }
    }

    public function delete($id)
    {   
        $deleted = $this->productModel::destroy($id);

        if ($deleted) 
        {
            return response()->json([
                'message' => 'Registro deletado com sucesso!',
            ], 200);
        } 
        else 
        {
            return response()->json([
                'message' => 'Ocorreu um erro ao tentar excluir o objeto!',
            ], 404);
        }
    }

    public function update(array $data) 
    {
        $updatedProduct = $this->productModel::find($data["id"]);

        if (!$updatedProduct) 
        {
            return response()->json([
                'message' => 'Objeto não encontrado!',
            ], 200);
        }

        $updatedProduct->update($data);

        if ($updatedProduct) {
            return response()->json([
                'message' => 'Registro atualizado com sucesso!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Ocorreu um erro ao tentar atualizar o objeto!',
            ], 404);
        }
    }
}
