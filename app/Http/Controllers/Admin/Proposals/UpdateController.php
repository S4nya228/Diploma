<?php

namespace App\Http\Controllers\Admin\Proposals;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Proposals\UpdateRequest;
use App\Models\Proposal;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Proposal $proposal)
    {
        $data = $request->validated();
        $proposal->update($data);
        return view("admin.proposals.show", ["proposal" => $proposal]);
    }

}
