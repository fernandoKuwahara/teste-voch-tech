<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UnityService;
use Illuminate\Support\Facades\Validator;

class UnityController extends Controller
{
    protected $unityService;

    public function __construct(UnityService $unityService)
    {
        $this->unityService = $unityService;
    }

    public function show()
    {
        return $this->unityService->show();
    }

    public function register(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'fantasy-name' => 'required|string|max:128',
            'corporate-name' => 'required|string|max:128',
            'cnpj' => ['required', 'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/'],
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->unityService->register($validatedData->validated());
    
            return $result;
        }
    }

    public function delete($id)
    {
        $result = $this->unityService->delete($id);

        return $result;
    }

    public function update(Request $request, $id = 0)
    {
        $validatedData = Validator::make($request->all(), [
            'fantasy-name' => 'required|string|max:128',
            'corporate-name' => 'required|string|max:128',
            'cnpj' => ['required', 'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/'],
            'id' => 'required|integer',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->unityService->update($validatedData->validated());
    
            return $result;
        }
    }
}
