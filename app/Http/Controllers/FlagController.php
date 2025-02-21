<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FlagService;
use Illuminate\Support\Facades\Validator;

class FlagController extends Controller
{
    protected $flagService;

    public function __construct(FlagService $flagService)
    {
        $this->flagService = $flagService;
    }

    public function show() {
        return $this->flagService->show();
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
            $result = $this->flagService->register($validatedData->validated());
    
            return $result;
        }
    }

    public function delete($id) 
    {
        $result = $this->flagService->delete($id);

        return $result; 
    }
    
    public function update(Request $request, $id = 0) 
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
            $result = $this->flagService->update($id, $validatedData->validated());
    
            return $result;
        }
    }
}
