<?php

namespace App\Livewire\Admin\Students;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function impersonate($userId)
    {
        $user = Auth::user();

        if(! $user->hasRole('Owner')) {
            return;
        }

        $originalId = $user->id;
        session()->put('impersonate', $originalId);
        auth()->loginUsingId($userId);

        return redirect('/' . session('locale', 'en') . '/dashboard');
    }    

    public function render()
    {        
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.students.index', [
            'users' => $users   
        ]);        
    }
}
