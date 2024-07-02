<?php

namespace App\Repositories;

use App\Models\File;
use Illuminate\Http\Request;

class FileRepository
{
    protected $model;

    /**
     * FileRepository constructor.
     *
     * @param File $model
     */
    public function __construct(File $model)
    {
        $this->model = $model;
    }

    public function getAllFiles(Request $request)
    {
        $query = $this->model->query();

        if ($request->has('name')) {
            $query->where('name', $request->name);
        }
        if ($request->has('price')) {
            $query->where('price', $request->price);
        }
        if ($request->has('bedrooms')) {
            $query->where('bedrooms', $request->bedrooms);
        }
        if ($request->has('bathrooms')) {
            $query->where('bathrooms', $request->bathrooms);
        }
        if ($request->has('storeys')) {
            $query->where('storeys', $request->storeys);
        }
        if ($request->has('garages')) {
            $query->where('garages', $request->garages);
        }

        $perPage = $request->input('perPage', 15);
        return $query->paginate($perPage);
    }
}
