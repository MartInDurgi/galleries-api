<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Http\Resources\GalleryResource;
use App\Models\Photo;
use App\Models\User;

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
        $data = $request->validated();
        //$gallery = Gallery::create($data);
        $user_id = User::where('email', $data['user_email'])->first()->id;
        $gallery = Gallery::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => $user_id
        ]);
        $photos = $data["url's"];
        foreach ($photos as $photo) {
            Photo::create([
                'url' => $photo,
                'gallery_id' => $gallery->id,
            ]);
        }


        //return ([$user_id, $data]);

        return [$gallery, $data["url's"]];
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
