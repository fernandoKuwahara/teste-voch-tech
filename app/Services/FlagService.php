<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Flag;
use App\Models\EconomicGroup;

class FlagService
{
    protected $flagModel;

    public function __construct(Flag $flagModel) 
    {
        $this->flagModel = $flagModel;
    }

    public function show() 
    {
        return $this->flagModel->all();
    }

    public function register(array $data)
    {
        $result = $this->flagModel::firstOrCreate($data);

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
        $deleted = $this->flagModel::destroy($id);

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
        $flag = $this->flagModel::find($data["id"]);

        if (!$flag) 
        {
            return response()->json([
                'message' => 'Objeto não encontrado!',
            ], 200);
        }

        $result = $flag->update($data);

        if ($result) 
        {
            if ($id == 0) 
            {
                return response()->json([
                    'message' => 'Registro atualizado com sucesso!',
                    'data' => $flag
                ], 201);
            } 
            else
            {
                $economicGroup = (new EconomicGroup())::find($id);
                
                if (!$economicGroup) {
                    return response()->json([
                        'message' => 'Registro atualizado com sucesso, porém, não foi encontrado Unidade informada!',
                    ], 200);
                }
                
                $flag->economicGroup()->associate($economicGroup);
                $flag->save();

                return response()->json([
                    'message' => 'Registro atualizado com sucesso e associado com Unidade informada!',
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
