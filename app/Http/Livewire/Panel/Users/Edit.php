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
    // existing stored image path (string) -- keep separate from Livewire upload instance
    public  $existing_image;
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
        'user_image'=>'nullable|image|max:20024',
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
    $updateUser= User::findOrFail($id);
        // If a new upload was provided, store it and update DB. Otherwise keep existing stored path.
        if ($this->user_image && is_object($this->user_image)) {
            $user_image = $this->user_image->store('public/images/user_image');
            $updateUser->user_image = "/storage/images/user_image/" . explode("/", $user_image)[3];
        } elseif ($this->existing_image && is_string($this->existing_image)) {
            // keep existing image path (no-op)
            $updateUser->user_image = $this->existing_image;
        }

    $updateUser->update([
            'id'=>$this->data['id'],
            'lastname'=>$this->data['lastname'],
            'name'=>$this->data['name'],
            'role'=>$this->data['role'],
            'email'=>$this->data['email'],
            'password'=> isset($this->data['password']) && $this->data['password'] ? Hash::make($this->data['password']) : $updateUser->password,
            'gender'=>$this->data['gender'],
            'news'=>$this->data['news'],
            'policy'=>$this->data['policy'],
    ]);

    // Notify parent to refresh list and close edit form
    $this->emitUp('userSaved');
    $this->emitUp('showAlert', "ویرایش کاربر با موفقیت انجام شد.");
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
            // Do not assign the stored string path to the Livewire upload property.
            // Keep it in a separate property so the template can differentiate between an
            // uploaded TemporaryUploadedFile and an existing stored string path.
            $this->existing_image = $this->editUser->user_image;
            $this->user_image = null;
            $this->data['news']= $this->editUser->news;
            $this->data['policy']= $this->editUser->policy;


            // dd ($this->editUser);
     }
    public function render()
{
        return view('livewire.panel.users.edit')->layout('layouts.panel');

    }

}
