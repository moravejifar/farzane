<?php

namespace App\Http\Livewire\Panel\Users;
// use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;


class Edit extends Component
{
    public  $editUser;
    use WithFileUploads;
    public  $user_image;
    public $isUploading =false;
    public $data=[
        "id"=>"",
        "role"=>"",
        "name"=>"",
        "lastname"=>"",
        "role"=>"",
        "email"=>"",
        "password"=>"",
        "bio"=>"",
        "gender"=>"",
        "news"=>"",
        "policy"=>""
    ];
    protected function rules()
    {
         return [
        'user_image'=>'image| max:1024',
        'data.id'=>'required',
        'data.name'=>'required',
        'data.lastname'=>'required',
        'data.role'=>'required',
        // 'data.email'=>['required|email',Rule::unique('Users')->ignore($this->data['id'])],
        // 'data.email' => ['required', 'email', 'not_in:' . auth()->user()->email],
        'data.email' => 'required|string|email|max:255|unique:users,email,' . $this->data['id'],
        // 'data.password'=>'required|string|min:6|confirmed',
        'data.gender'=>'required',
        'data.news'=>'required',
        'data.policy'=>'required',
    ];
}
    public function updateImage()
    {

             $this->isUploading =true;

    }

    public function handleUpdate($id)
{
    $this->validate();
    // dd('1');
    // $this->isUploaded =True;
   $updateUser= User::findOrFail($id);
   $user_image=$this->user_image->store('public/images/user_image');
   $updateUser->update([

            'id'=>$this->data['id'],
            'lastname'=>$this->data['lastname'],
            'name'=>$this->data['name'],
            'role'=>$this->data['role'],
            'email'=>$this->data['email'],
            'password'=>Hash::make($this->data['password']),
            'gender'=>$this->data['gender'],
            'user_image'=>"/storage/images/user_image/". explode("/", $user_image)[3],
            'news'=>$this->data['news'],
            'policy'=>$this->data['policy'],

    ]);
    // dd($this->editUser);
    //  dd($user_image);
    // dd($updateUser->lastname);
    // dd($this->data['lastname'] ) ;
    $this->emit('showAlert', "ویرایش کاربر با موفقیت انجام شد.");
return redirect('/panel/users');
}

    public function mount($id)
     {
             $this->reset();
            $this->editUser=User::where('id',$id)->first();
            $this->data['id']= $this->editUser->id;
            $this->data['lastname']= $this->editUser->lastname;
            $this->data['name']= $this->editUser->name;
            $this->data['role']= $this->editUser->role;
            $this->data['email']= $this->editUser->email;
            $this->data['password']= $this->editUser->password;
            $this->data['gender']= $this->editUser->gender;
            $this->user_image= $this->editUser->user_image;
            $this->data['news']= $this->editUser->news;
            $this->data['policy']= $this->editUser->policy;


            // dd ($this->editUser);
     }
    public function render()
{
        return view('livewire.panel.users.edit')
        ->layout('layouts.panel');

    }

}
