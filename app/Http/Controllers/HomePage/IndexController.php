<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\Region;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    private $statusTitles = [
        'in_progress' => 'ТРИВАЄ ЗБІР ГОЛОСІВ',
        'under_review' => 'ЗНАХОДЯТЬСЯ НА РОЗГЛЯДІ',
        'received_response' => 'ОТРИМАЛИ ВІДПОВІДЬ',
    ];

    public function __invoke(Request $request)
    {

        $status = $request->input('status_id');
        $sort = $request->input('sort', 'date');
        $direction = $request->input('direction', 'desc');
        $regionId = $request->input('region_id');
        $search = $request->input('search');

        $proposalsQuery = Proposal::query();

        // Фільтрування по статусу
        if ($status === 'in_progress') {
            $proposalsQuery->where('status_id', 1);
        } elseif ($status === 'under_review') {
            $proposalsQuery->where('status_id', 2);
        } elseif ($status === 'received_response') {
            $proposalsQuery->where('status_id', 3);
        }

        // Сортування по даті та кількістю голосів
        if ($sort === 'date') {
            $proposalsQuery->orderBy('created_at', $direction);
        } elseif ($sort === 'vote') {
            $proposalsQuery->orderBy('vote_count', $direction);
        }
        // Змінюємо напрямок сортування
        $nextDirection = $direction === 'desc' ? 'asc' : 'desc';

        //фільтрування по районам
        if ($regionId) {
            $proposalsQuery->where('region_id', $regionId);
        }
        //пошук головний
        if ($search) {
            $proposalsQuery->where(function ($query) use ($search) {
                if (is_numeric($search)) {
                    $query->where('id', $search);
                } else {
                    $query->where('id', 'like', $search . '%');
                }
            })
                ->orWhere('title', 'ilike', '%' . $search . '%');
        }

        $proposalsQuery->whereHas('user', function ($query) {
            $query->where('is_approved', true);
        });


        $proposals = $proposalsQuery->paginate(10)->withQueryString();

        //останні 5 відповідей
        $responses = Proposal::where('status_id', 3)->orderBy('updated_at', 'desc')->take(5)->get();

        //зміна title
        $title = $this->statusTitles[$status] ?? 'Всі пропозиції';

        return view("main.index",
            ["regions" => Region::all(),
            "proposals" => $proposals,
                "status" => $status,
                "regionId" => $regionId,
                "title" => $title,
                "responses"=>$responses,
                "sort" => $sort,
                "nextDirection" => $nextDirection,
                "search" => $search]);
    }


}
