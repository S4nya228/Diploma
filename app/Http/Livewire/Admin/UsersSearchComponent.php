<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersSearchComponent extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = User::query();

        if (!empty($this->search)) {
            $query->whereRaw("CONCAT(last_name, ' ', first_name, ' ', middle_name) LIKE '%{$this->search}%'")
                ->orWhereHas('role', function ($query) {
                    $query->where('name', 'ilike', '%'.$this->search.'%');
                });
        }

        $users = $query->paginate(50);

        return view('livewire.admin.search.users-search-component', [
            'users' => $users,
        ]);
    }
}
