<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CollaboratorService;
use Illuminate\Support\Facades\Validator;

class CollaboratorController extends Controller
{
    protected $collaboratorService;

    public function __construct(CollaboratorService $collaboratorService)
    {
        $this->collaboratorService = $collaboratorService;
    }

    public function show() 
    {
        return $this->collaboratorService->show();
    }

    public function register(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'email' => 'required|email|max:128',
            'cpf' => ['required', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->collaboratorService->register($validatedData->validated());

            return $result;
        }
    }

    public function delete($id) 
    {
        $result = $this->collaboratorService->delete($id);

        return $result;
    }

    public function update(Request $request, $id = 0) 
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'email' => 'required|email|max:128',
            'cpf' => ['required', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
            'id' => 'required|integer',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->collaboratorService->update($id, $validatedData->validated());
    
            return $result;
        }
    }
}
