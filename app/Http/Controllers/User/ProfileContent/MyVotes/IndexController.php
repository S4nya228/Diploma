<?php

namespace App\Http\Controllers\User\ProfileContent\MyVotes;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = auth()->user()->id;
        $proposals = Proposal::whereHas('votes', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->paginate(5);

        return view('user.my-votes', ['proposals' => $proposals]);
    }
}
