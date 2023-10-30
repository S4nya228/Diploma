<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Helps\StoreRequest;
use App\Models\Help;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Help::create($data);
        return redirect()->route("admin.helps.index");
    }
}
