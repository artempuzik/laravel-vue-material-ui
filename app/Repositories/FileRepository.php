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
            $searchTerm = '%' . strtolower($request->input('name')) . '%';
            $query->whereRaw('LOWER(name) LIKE ?', [$searchTerm]);
        }
        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('price', [$request->input('price_min'), $request->input('price_max')]);
        } elseif ($request->has('price_min')) {
            $query->where('price', '>=', $request->input('price_min'));
        } elseif ($request->has('price_max')) {
            $query->where('price', '<=', $request->input('price_max'));
        }
        if ($request->has('bedrooms')) {
            $query->where('bedrooms', $request->input('bedrooms'));
        }
        if ($request->has('bathrooms')) {
            $query->where('bathrooms', $request->input('bathrooms'));
        }
        if ($request->has('storeys')) {
            $query->where('storeys', $request->input('storeys'));
        }
        if ($request->has('garages')) {
            $query->where('garages', $request->input('garages'));
        }

        if ($request->has('sortKey') && $request->has('sortOrder')) {
            $query->orderBy($request->input('sortKey'), $request->input('sortOrder'));
        }

        $perPage = $request->input('perPage', 15);
        return $query->paginate($perPage);
    }
}
