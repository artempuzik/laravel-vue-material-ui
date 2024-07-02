<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FileRepository;

class FileController extends Controller
{
    protected $fileRepository;

    public function __construct(FileRepository $fileRepository)
    {
        $this->fileRepository = $fileRepository;
    }

    public function index(Request $request)
    {
        $files = $this->fileRepository->getAllFiles($request);

        return response()->json($files);
    }
}
