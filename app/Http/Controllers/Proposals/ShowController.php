<?php

namespace App\Http\Controllers\Proposals;

use App\Http\Controllers\Controller;
use App\Models\Proposal;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Proposal $proposal)
    {

        return view("proposals.show", ["proposal"=>$proposal]);
    }
}
