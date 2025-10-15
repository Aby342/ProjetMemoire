<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
         return response()->json([
        'users' => User::all()
        ]);
    }

   public function destroy($id)
   {
      $user = User::find($id);

     if (!$user) {
        return response()->json(['message' => 'Utilisateur introuvable'], 404);
    }

       $user->delete();
       
         return response()->json(['message' => 'Utilisateur supprimé avec succès']);
     if ($user->role === 'admin') {

           return response()->json(['message' => 'Impossible de supprimer un administrateur'], 403);
}

}


}
