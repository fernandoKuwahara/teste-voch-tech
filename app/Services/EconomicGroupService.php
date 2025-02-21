<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\EconomicGroup;

class EconomicGroupService
{
    protected $economicGroupModel;

    public function __construct(EconomicGroup $economicGroupModel) 
    {
        $this->economicGroupModel = $economicGroupModel;
    }

    public function show() 
    {
        return $this->economicGroupModel->all();
    }

    public function register(array $data) 
    {
        $economicGroup = $this->economicGroupModel::firstOrCreate($data);

        if ($economicGroup->wasRecentlyCreated) {
            return response()->json([
                'message' => 'Registro criado com sucesso!',
                'data' => $economicGroup
            ], 201);
        } else {
            return response()->json([
                'message' => 'Registro já existia no banco.',
                'data' => $economicGroup
            ], 200);
        }
    }

    public function delete($id) 
    {
        $deleted = $this->economicGroupModel::destroy($id);

        if ($deleted) {
            return response()->json([
                'message' => 'Registro deletado com sucesso!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Ocorreu um erro ao tentar excluir o objeto!',
            ], 404);
        }
    }

    public function update(array $data) 
    {
        $updatedGroup = $this->economicGroupModel::find($data["id"]);

        if (!$updatedGroup) 
        {
            return response()->json([
                'message' => 'Objeto não encontrado!',
            ], 200);
        }

        $updatedGroup->update($data);

        if ($updatedGroup) {
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
