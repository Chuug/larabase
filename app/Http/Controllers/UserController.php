<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ImageSize;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings()
    {
        return view('user.settings');
    }

    public function updateProfile(Request $request)
    {
        $this->authorize('updateProfile', User::class);

        $rules = [
            'name' => ['required'],
            'email' => ['required','email']
        ];
        
        $this->validate($request,$rules);

        $user = User::find(Auth::user()->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success',"Les informations de votre profil ont bien été modifiées");
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'old_password' => ['required',new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'confirm_password' => ['required','same:new_password']
        ];

        $messages = [
            'old_password.required' => 'Le champ est obligatoire.',
            'new_password.required' => 'Le champ est obligatoire.',
            'confirm_password.required' => 'Le champ est obligatoire.'
        ];

        $this->validate($request,$rules,$messages);

        $user = new User;
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        return redirect()->back()->with('success',"Le mot de passe a bien été modifié");              
    }

    public function updateAvatar(Request $request)
    {
        $rules = [
            'avatar' => ['required','image',new ImageSize]
        ];
      
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) 
            return redirect()->to(url()->previous() . "#update-avatar")->withErrors($validator);
        
        $image = $request->file('avatar');
        $file = Auth::user()->id . '.png';
        $image->storeAs('public/users/avatar' ,$file);

        return redirect()->back()->with('success',"L'avatar a bien été mis à jour");
    }
}
