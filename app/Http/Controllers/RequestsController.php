<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RequestService;
use Illuminate\Support\Facades\Validator;
use App\DataTables\ReportsDataTable;

class RequestsController extends Controller
{
    protected $requestService;

    public function __construct(RequestService $requestService) 
    {
        $this->requestService = $requestService;
    }

    public function show()
    {
        return $this->requestService->show();
    }

    public function register(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'unitys_id' => 'required|integer|exists:unitys,id',
            'collaborators_id' => 'required|integer|exists:collaborators,id',
            'products_id' => 'required|integer|exists:products,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->requestService->register($validatedData->validated());
    
            return $result;
        }
    }

    public function audit(ReportsDataTable $dataTable)
    {
        $result = $this->requestService->audit();

        return $dataTable->dataTable($result);
    }

    public function reports(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'typeReport' => 'required|integer|between: 1,3',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'id' => 'required_if:typeReport,2,3|integer',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validatedData->errors(),
            ], 422);
        } else {
            $result = $this->requestService->reports($validatedData->validated());

            return $result;
        }
    }
}
