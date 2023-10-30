<?php

namespace App\Http\Controllers\Admin\Proposals;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view("admin.proposals.index");
    }
}
