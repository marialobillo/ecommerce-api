<?php

namespace Tests\Feature\Sliders;

use App\Models\Slider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListSlidersTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
    public function can_fetch_a_single_slider()
    {
      $this->withoutExceptionHandling();

      $slider = Slider::factory()->create();

      $response = $this->getJson(route('api.v1.sliders.show', $slider));

      $response->assertExactJson([
        'data' => [
          'type' => 'sliders', 
          'id' => (string) $slider->getRouteKey(),
          'attributes' => [
            'description1' => $slider->description1,
            'description2' => $slider->description2,
            'slider_image' => $slider->slider_image, 
            'status' => $slider->status
          ],
          'links' => [
            'self' => route('api.v1.sliders.show', $slider),
          ]
        ]
      ]);
    }

}
