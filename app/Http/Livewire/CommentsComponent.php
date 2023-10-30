<?php

namespace App\Http\Livewire;

use App\Models\LikeComment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class CommentsComponent extends Component
{
    use WithPagination;

    public $proposalId;
    public $commentContent;
    public $showMore = false;
    public $totalCommentsCount = 0;
    public $sortBy = 'date'; // сортування за датою
    public $sortDirection = 'asc'; //по дефолту сортування у зворотному порядку

    public function mount($proposalId)
    {
        $this->proposalId = $proposalId;
        $this->totalCommentsCount = Comment::where('proposal_id', $this->proposalId)->count();
    }


    //створення коментаря
    public function addComment()
    {
        $this->validate([
            'commentContent' => 'required',
        ]);

        Comment::create([
            'content' => $this->commentContent,
            'proposal_id' => $this->proposalId,
            'user_id' => Auth::id(),
        ]);

        $this->commentContent = '';
    }

    //метод для лайку/дизлайку
    public function toggleInteraction($commentId, $interactionType)
    {
        $comment = Comment::findOrFail($commentId);

        $existingInteraction = LikeComment::where('user_id', Auth::id())
            ->where('comment_id', $commentId)
            ->where('interaction_type', $interactionType)
            ->first();

        if ($existingInteraction) {
            $existingInteraction->delete();
        } else {
            LikeComment::where('user_id', Auth::id())
                ->where('comment_id', $commentId)
                ->whereIn('interaction_type', ['like', 'dislike'])
                ->delete();

            LikeComment::create([
                'user_id' => Auth::id(),
                'comment_id' => $commentId,
                'interaction_type' => $interactionType,
            ]);
        }
    }

    //лайк
    public function likeComment($commentId)
    {
        $this->toggleInteraction($commentId, 'like');
    }

    //дизлайк
    public function dislikeComment($commentId)
    {
        $this->toggleInteraction($commentId, 'dislike');
    }

    //показати ще
    public function showMore()
    {
        $this->showMore = true;
    }

    public function sortByDate()
    {
        $this->sortBy = 'date';
        $this->sortDirection = $this->sortDirection === 'desc' ? 'asc' : 'desc';
    }

    public function sortByPopularity()
    {
        $this->sortBy = 'popularity';
        $this->sortDirection = $this->sortDirection === 'desc' ? 'asc' : 'desc';
    }

    //видалення коментів
    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);


        // Перевірка, чи користувач має право видаляти коментар

        // Видалення коментаря
        $comment->delete();
    }

    public function render()
    {
        $query = Comment::leftJoin('like_comments', 'comments.id', '=', 'like_comments.comment_id')
            ->select('comments.*', DB::raw('SUM(CASE WHEN like_comments.interaction_type = \'like\' THEN 1 ELSE 0 END) as total_likes'))
            ->where('comments.proposal_id', $this->proposalId)
            ->groupBy('comments.id');

        $sortField = $this->sortBy === 'date' ? 'comments.created_at' : 'total_likes';
        $sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';

        if ($this->showMore) {
            Paginator::useBootstrap();
            $comments = $query->orderBy($sortField, $sortDirection)->paginate(9999);
        } else {
            $comments = $query->orderBy($sortField, $sortDirection)->paginate(5);
        }

        $this->totalCommentsCount = Comment::where('proposal_id', $this->proposalId)->count(); // Оновлення кількості коментарів

        return view('livewire.comments-component', compact('comments'));
    }

}