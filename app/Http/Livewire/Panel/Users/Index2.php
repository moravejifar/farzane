<?php

namespace App\Http\Livewire\Panel\Users;

use Livewire\Component;
use App\Models\User;
class Index2 extends Component
{
    public   $newUsers;
    // public   $userToEdit;
    // public function editUser($id)
    // {

    //     $user=User::find($id);
    //     $this->$newusers= $user->name;
    //     // return redirect()->route('users');
    // }

    public function deleteUser($id)
    {

        User::where('id',$id)->delete();
        $this->newUsers= $this->newUsers->where('id', '!=', $id);
        // $this->emit('showAlert', "کاربر با موفقیت حذف شد.");
        // $this->session()->flash('status', 'کاربر به درستی ایجاد شد!');
        return redirect()->route('users');

    }

    public function mount(){
        $this->newUsers=User::all();

    }
    public function render()
    {
        return view('livewire.panel.users.index2')
        ->layout('layouts.panel');
    }
}
