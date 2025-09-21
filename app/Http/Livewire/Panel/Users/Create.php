<?php

namespace App\Http\Livewire\Panel\Users;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Create extends Component
{  use WithFileUploads;
    public  $user_image;
    public $isUploading=false;
    public $data=[
        // "id"=>"",
        "role"=>"",
        "name"=>"",
        "lastname"=>"",
        "role"=>"کاربر عادی",
        "email"=>"",
        "password"=>"",
        "bio"=>"",
        "gender"=>false,
        "news"=>false,
        "policy"=>false
    ];
    protected $rules=[
        'user_image'=>'image| max:1024',
        // 'data.id'=>'required',
        'data.name'=>'required|min:3',
        'data.lastname'=>'required',
        'data.role'=>'required',
        'data.email'=>'required|email|unique:users,email',
        'data.password'=>'required|string|min:6|confirmed',
        'data.bio'=>"",
        'data.gender'=>'required',
        'data.news'=>'required',
        'data.policy'=>'required',
    ];

    public function Created()
{
    $this->validate();
    $user_image=$this->user_image;

    if (is_file($user_image))
    {    $this->isUploading="true";
         $user_image=$this->user_image->store('public/images/user_image');
    }
//    dd($this->user_image);
        $user=new User;
        $user->name=$this->data['name'];
        $user->lastname=$this->data['lastname'];
        $user->role=$this->data['role'];
        $user->email=$this->data['email'];
        $user->password=Hash::make($this->data['password']);
        // $user->bio=$this->data['bio'];
        $user->gender=$this->data['gender'];
    if ($this->isUploading){ $user->user_image="/storage/images/user_image/". explode("/", $user_image)[3];}
    else {$user->user_image='/storage/images/user_image/1.jpg';}
        $user->news=$this->data['news'];
        $user->policy=$this->data['policy'];
        $user->save();
        $this->emit('showAlert', "کاربر با موفقیت اضافه شد.");
    }
public function mount(){
    $this->reset();
}

    public function render()
    {
        return view('livewire.panel.users.create')
        ->layout('layouts.panel');

    }
}






        // $this->validate([
        //     'data.id'=>'required',
        //     'data.name'=>'required',
        //     'data.lastname'=>'required',
        //     'data.role'=>'required',
        //     'data.email'=>'required|email|unique:users,email',
        //     'data.password'=>'required|string|min:6|confirmed',
        //     // 'data.bio'=>"",
        //     'data.gender'=>'required',
        //     'data.news'=>'required',
        //     'data.policy'=>'required',
        // ]);

        // dd($this->data['user_image']);

        // $this->validateOnly($rules);

        // $this->validate();
