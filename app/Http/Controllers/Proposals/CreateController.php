<?php

namespace App\Http\Controllers\Proposals;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
    return view('proposals.create', ["regions" => Region::all()]);
    }
}
