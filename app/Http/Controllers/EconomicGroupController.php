<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EconomicGroupService;
use Illuminate\Support\Facades\Validator;

class EconomicGroupController extends Controller
{
    protected $economicGroupService;

    public function __construct(EconomicGroupService $economicGroupService)
    {
        $this->economicGroupService = $economicGroupService;
    }

    public function show() 
    {
        return $this->economicGroupService->show();
    }

    public function register(Request $request) 
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->economicGroupService->register($validatedData->validated());
    
            return $result;
        }
    }

    public function delete($id) 
    {
        if (is_numeric($id)) {
            return $this->economicGroupService->delete($id);
        } else {
            return response()->json([
                'message' => 'Informe um valor válido para a exclusão!',
            ], 404);
        }
    }

    public function update(Request $request) 
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'id' => 'required|integer',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->economicGroupService->update($validatedData->validated());
    
            return $result;
        }
    }
}
