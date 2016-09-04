<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests;
use App\Fragment;

class FragmentsController extends Controller
{
    public function index($id)
    {
        return Fragment::find($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if (Fragment::Create($data)) {
            return $this->response->created();
        }

        return $this->response->errorBadRequest();
    }
}
