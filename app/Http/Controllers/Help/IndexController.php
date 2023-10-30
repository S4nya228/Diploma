<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $helps = Help::all();
        $selectedHelp = Help::find($id);

        return view('help.index', [
            'helps' => $helps,
            'selectedHelp' => $selectedHelp,
            'help' => $selectedHelp
        ]);
    }
}

