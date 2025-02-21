<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Unity;
use App\Models\Flag;

class UnityService
{
    protected $unityModel;

    public function __construct(Unity $unityModel) 
    {
        $this->unityModel = $unityModel;
    }

    public function show() 
    {
        return $this->unityModel->all();
    }

    public function register(array $data)
    {
        $result = $this->unityModel::firstOrCreate($data);

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
        $deleted = $this->unityModel::destroy($id);

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

    public function update($id, array $data) 
    {
        $unity = $this->unityModel::find($data["id"]);

        if (!$unity) 
        {
            return response()->json([
                'message' => 'Objeto não encontrado!',
            ], 200);
        }

        $result = $unity->update($data);

        if ($result) 
        {
            if ($id == 0) 
            {
                return response()->json([
                    'message' => 'Registro atualizado com sucesso!',
                    'data' => $unity
                ], 201);
            } 
            else
            {
                $flag = (new Flag())::find($id);
                
                if (!$flag) {
                    return response()->json([
                        'message' => 'Registro atualizado com sucesso, porém, não foi encontrado Unidade informada!',
                    ], 200);
                }
                
                $unity->flag()->associate($flag);
                $unity->save();

                return response()->json([
                    'message' => 'Registro atualizado com sucesso e associado com Unidade informada!'
                ], 200);
            }
        } 
        else 
        {
            return response()->json([
                'message' => 'Ocorreu um erro ao tentar atualizar o objeto!'
            ], 404);
        }
    }
}
