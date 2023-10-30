<?php

namespace App\Http\Controllers\Proposals;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proposals\StoreRequest;
use App\Models\Proposal;
use Carbon\Carbon;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $countdown = Carbon::now()->addDays(30);
        $data['countdown'] = $countdown;
        $data['is_approved'] = false;
        Proposal::firstOrCreate($data);
        return redirect()->route("main.index");
    }
}
