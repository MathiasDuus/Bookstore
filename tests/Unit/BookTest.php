<?php

namespace Tests\Unit;

use App\Http\Resources\BookResource;
use App\Models\book;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class BookTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_response_code_get_specific_amount_books()
    {
        $response = $this->get('/api/book/amount/5');

        $response->assertStatus(200);
    }

    public function test_response_get_specific_amount_books()
    {

        $plans    = book::take(5)->get();
        $resource = BookResource::collection($plans);
        $request  = $this->get('/api/book/5');

        $count = count($resource->response($request)->getData(true)['data']);

        $this->assertTrue($count == 5);
    }
}
