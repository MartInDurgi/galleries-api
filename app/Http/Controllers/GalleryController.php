<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = Gallery::get()->count();
        $term = request()->input('term');
        $skip = request()->input('skip', 0);
        $take = request()->input('take', 10);

        $metadata = [
            'total' => $count
        ];

        if ($term) {
            return response()->json([
                'data' => Gallery::search($term, $skip, $take),
                'metadata' => $metadata
            ]);
        } else {
            return response()->json([
                'data' => Gallery::skip($skip)->take($take)->get(),
                'metadata' => $metadata
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
    }
}
