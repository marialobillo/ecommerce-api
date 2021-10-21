<?php

namespace App\Http\Controllers\Api;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Resources\SliderResource;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{


    public function show(Slider $slider): SliderResource
    {
        return SliderResource::make($slider);
    }

}
