<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use App\Models\Gallery\Image;

class ImageService
{
    public function select()
    {
        return Image::latest()->get();
    }

    public function selectFirstBy($column, $value)
    {
        return Image::where($column, $value)->firstOrFail();
    }

    public function create($data)
    {
        $data['slug'] = Str::slug($data['name']);

        return Image::create($data);
    }

    public function update($data, $uuid)
    {
        $data['slug'] = Str::slug($data['name']);

        return Image::where('uuid', $uuid)->update($data);
    }
}
