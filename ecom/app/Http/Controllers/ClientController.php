<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getClients()
    {
        try{
            return User::all();
        }catch(Exception $e){
            return $e;
        }

    }

    public function addClient(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|max:255',
                'telephone' => 'required|unique:users|string',
                'address' => 'required|max:255',
                'password' => 'required',
            ]);

            $User = new User();
            $User->name = $request->name;
            $User->telephone = $request->telephone;
            $User->address = $request->address;
            $User->password = $request->password; // we should hash password !!!
            $User->save();
            return $User;
        }catch(Exception $e){
            return $e;
        }

    }

    public function updateClient(Request $request, $id)
    {
        try{
            $request->validate([
                'name' => 'required|max:255',
                'telephone' => 'required|unique:users|string',
                'address' => 'required|max:255',
                'password' => 'required',
            ]);

            $User = User::where('id', $id)->first();
            $User->name = $request->name;
            $User->slug = $request->slug;
            $User->address = $request->address;
            $User->categorie = $request->categorie;
            $User->save();

            return $User;
        }catch(Exception $e){
            return $e;
        }
    }

    public function deleteClient(Request $request, $id)
    {

       try {
            $User = User::where('id', $id)->first();
            $User->delete();

            return $User;
       } catch (Exception $e) {
            return $e;
       }
    }
}
