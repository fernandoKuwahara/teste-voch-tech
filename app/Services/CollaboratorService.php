<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Collaborator;
use App\Models\Unity;

class CollaboratorService
{
    protected $collaboratorModel;

    public function __construct(Collaborator $collaboratorModel) 
    {
        $this->collaboratorModel = $collaboratorModel;
    }

    public function show() 
    {
        return $this->collaboratorModel->all();
    }

    public function register(array $data)
    {
        $result = $this->collaboratorModel::firstOrCreate($data);

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
        $deleted = $this->collaboratorModel::destroy($id);

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
        $collaborator = $this->collaboratorModel::find($data["id"]);

        if (!$collaborator) 
        {
            return response()->json([
                'message' => 'Objeto não encontrado!',
            ], 200);
        }

        $result = $collaborator->update($data);

        if ($result) 
        {
            if ($id == 0) 
            {
                return response()->json([
                    'message' => 'Registro atualizado com sucesso!',
                    'data' => $collaborator
                ], 201);
            } 
            else
            {
                $unity = (new unity())::find($id);
                
                if (!$unity) {
                    return response()->json([
                        'message' => 'Registro atualizado com sucesso, porém, não foi encontrado Unidade informada!',
                    ], 200);
                }
                
                $collaborator->unitys()->associate($unity);
                $collaborator->save();

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
