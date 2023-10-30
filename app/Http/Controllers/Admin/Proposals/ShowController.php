<?php

namespace App\Http\Controllers\Admin\Proposals;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Proposal $proposal)
    {

        return view('admin.proposals.show',["proposal" => $proposal]);
    }
}
