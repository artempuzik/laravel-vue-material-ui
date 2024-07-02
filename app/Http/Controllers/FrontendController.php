<?php

namespace App\Http\Controllers;

use App\Repositories\FileRepository;
use Illuminate\Http\Request;

class FrontendController
{
    private $fileRepository;

    public function __construct(FileRepository $fileRepository)
    {
        $this->fileRepository = $fileRepository;
    }

    public function show(Request $request)
    {
        $files = $this->fileRepository->getAllFiles($request);

        return view('frontend', compact('files'));
    }
}
