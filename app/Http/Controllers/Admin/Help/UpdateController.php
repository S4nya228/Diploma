<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Helps\UpdateRequest;
use App\Models\Help;


class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */

        public function __invoke(UpdateRequest $request, Help $help)
    {
        $data = $request->validated();
        $help->update($data);
        return view("admin.helps.show", ["help" => $help]);
    }

}
