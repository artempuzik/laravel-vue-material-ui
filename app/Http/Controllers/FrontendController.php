<?php

namespace App\Http\Controllers;

use App\Repositories\DataRepository;
use Illuminate\Http\Request;

class FrontendController
{
    private DataRepository $dataRepository;

    public function __construct(DataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function show(Request $request)
    {
        $files = $this->dataRepository->getAllData($request);

        return view('frontend', compact('files'));
    }
}
