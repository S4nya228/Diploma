<?php

namespace App\Http\Controllers\Admin\Proposals;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()->route("admin.proposals.index");
    }
}
