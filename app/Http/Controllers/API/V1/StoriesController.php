<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests;
use App\Story;
use Dingo\Api\Routing\Helpers;
use App\Transformers\StoriesTransformer;

class StoriesController extends Controller
{
    use Helpers;

    public function index(Story $story, \Response $response, $id)
    {
        $stories = $story->with('fragments')->first();
        return $this->item($stories, new StoriesTransformer);
    }
}
