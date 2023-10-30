<?php

namespace App\Http\Controllers\Admin\Proposals;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\Region;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Proposal $proposal)
    {
        $regions = Region::all();
        return view("admin.proposals.edit", ["proposal" => $proposal, 'regions'=>$regions]);
    }
}
