<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DataRepository;
use Illuminate\Routing\Controller;

class DataController extends Controller
{
    protected DataRepository $dataRepository;

    public function __construct(DataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function index(Request $request)
    {
        $files = $this->dataRepository->getAllData($request);

        return response()->json($files);
    }
}
