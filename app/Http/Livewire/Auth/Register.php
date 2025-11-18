<?php
namespace App\Http\Livewire\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $data=[
        "name"=>"",
        "email"=>"",
        "password_confirmation"=>"",
        "policy"=>false
    ];
    // $table->id();
    // $table->string('id_token');
    // $table->boolean('is_admin');
    // $table->string('role');
    // $table->string('name');
    // $table->string('lastname');
    // $table->string('email')->unique();
    // $table->timestamp('email_verified_at')->nullable();
    // $table->string('password');
    // $table->string('two_factor_secret');
    // $table->string('two_factor_recovery_codes');
    // $table->string('bio');
    // $table->string('image');
    // $table->boolean('gender');
    // $table->boolean('news');
    // $table->rememberToken();
    // $table->timestamps();
    // $table->boolean('policy');
   

    public function handleRegister()
    {
        $this->validate([
            'data.name'=>'required',
            'data.email'=>'required|email|unique:users,email',
            'data.password'=>'required|string|min:6|confirmed',
            'data.policy'=>'required',
        ]);
        $user=new User;
        $user->name=$this->data['name'];
        $user->email=$this->data['email'];
        $user->password=Hash::make($this->data['password']);
        $user->gender=1;
        $user->save();
        $id=$user->id;
        Auth::loginUsingId($id);
        return redirect()->to('/');

    }
    public function render()
    {
        return view('livewire.auth.register')
        ->layout('layouts.auth');
    }
}
