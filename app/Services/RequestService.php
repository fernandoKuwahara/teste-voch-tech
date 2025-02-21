<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Requests;
use App\Models\Flag;

class RequestService
{
    protected $requestsModel;

    public function __construct(Requests $requestsModel) 
    {
        $this->requestsModel = $requestsModel;
    }

    public function show() 
    {
        return $this->requestsModel->all();
    }

    public function register(array $data)
    {
        $result = $this->requestsModel::firstOrCreate($data);

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

    public function audit()
    {
        $requests = $this->requestsModel::select('*')
                            ->join('products', 'requests.products_id', '=', 'products.id')
                            ->join('collaborators', 'requests.collaborators_id', '=', 'collaborators.id')
                            ->join('unitys', 'requests.unitys_id', '=', 'unitys.id');

        return $requests;
    }

    public function reports(array $data)
    {
        switch ($data['typeReport']) {
            case 1:

                $requests = $this->requestsModel::select('requests.id', 'unitys.fantasy-name as unity_name', 'collaborators.name as collaborator_name', 'products.name as product_name', 'requests.created_at', 
                                    DB::raw('COUNT(requests.id) as total_requests'))
                                    ->join('products', 'requests.products_id', '=', 'products.id')
                                    ->join('collaborators', 'requests.collaborators_id', '=', 'collaborators.id')
                                    ->join('unitys', 'requests.unitys_id', '=', 'unitys.id')
                                    ->whereBetween('requests.created_at', [$data['startDate'], $data['endDate']])
                                    ->groupBy('requests.id', 'unitys.fantasy-name', 'collaborators.name', 'products.name', 'requests.created_at')
                                    ->get();

                return $requests;
                break;

            case 2:
                $requests = $this->requestsModel::select('requests.id', 'unitys.fantasy-name as unity_name', 'collaborators.name as collaborator_name', 'products.name as product_name', 'requests.created_at', 
                                    DB::raw('COUNT(requests.collaborators_id) as total_requests'))
                                    ->join('products', 'requests.products_id', '=', 'products.id')
                                    ->join('collaborators', 'requests.collaborators_id', '=', 'collaborators.id')
                                    ->join('unitys', 'requests.unitys_id', '=', 'unitys.id')
                                    ->where('requests.collaborators_id', $data['id'])
                                    ->whereBetween('requests.created_at', [$data['startDate'], $data['endDate']])
                                    ->groupBy('requests.id', 'unitys.fantasy-name', 'collaborators.name', 'products.name', 'requests.created_at')
                                    ->get();

                return $requests;
                break;

            case 3:
                $requests = $this->requestsModel::select('requests.id', 'unitys.fantasy-name as unity_name', 'collaborators.name as collaborator_name', 'products.name as product_name', 'requests.created_at', 
                                    DB::raw('COUNT(requests.unitys_id) as total_requests'))
                                    ->join('products', 'requests.products_id', '=', 'products.id')
                                    ->join('collaborators', 'requests.collaborators_id', '=', 'collaborators.id')
                                    ->join('unitys', 'requests.unitys_id', '=', 'unitys.id')
                                    ->where('requests.unitys_id', $data['id'])
                                    ->whereBetween('requests.created_at', [$data['startDate'], $data['endDate']])
                                    ->groupBy('requests.id', 'unitys.fantasy-name', 'collaborators.name', 'products.name', 'requests.created_at')
                                    ->get();

                return $requests;
                break;
            
            default:
                return "Erro";
                break;
        }
    }
}
