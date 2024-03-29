<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
   public function index() 
   {   
      $countUsers = DB::table('users')->count();
      return view('administrator.index', [
         'countUsers' => $countUsers
      ]);
   }

   public function manageUsers()
   {
      $users = DB::table('users')->get();
      $test = User::all();

      return view('administrator.manage-users', [
         'users' => $test
      ]);
   }

   public function deleteUser($id = null)
   {
      if($id != Auth::user()->id) {
         if($id == null) {
               return redirect()->back();
         } else {
               $user = User::findOrFail($id);
               $username = $user->name;
               $user->delete();
               return redirect()->back()->with('success',"L'utilisateur " . $username . " a bien été supprimé");
         }
      } else {
         return redirect()->back()->with('error','Vous ne pouvez pas vous supprimer vous-même');
      }
   }

   public function promoteUser($id = null)
   {
      if($id != Auth::user()->id) {
         if($id == null) {
               return redirect()->back();
         } else {
               $user = User::findOrFail($id);
               
               // Handle new role --> Start
               $user->role = ($user->role === 1) ? 3 : 1;
               // --> End
               
               $user->save();
               return redirect()->back()->with('success',($user->role === 1) ? "L'utilisateur " . $user->name . " a bien été rétrogradé" : "L'utilisateur " . $user->name . " est maintenant administrateur");
         }
      } else {
         return redirect()->back()->with('error',"Vous ne pouvez pas vous rétrograder vous-même");
      }
   }

   public function reminder()
   {
      return view('administrator.reminder');
   }
}
