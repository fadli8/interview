<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Exception;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function getCategories()
    {
        try{
            return categorie::all();

        }catch(Exception $e){
            return $e;
        }
    }

    public function addCategorie(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
            ]);

            $categorie = new categorie();
            $categorie->name = $request->name;
            $categorie->save();

            return $categorie;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function updateCategorie(Request $request, $id)
    {
       try{
            $request->validate([
                'name' => 'required|max:255',
            ]);

            $categorie = categorie::where('id', $id)->first();
            $categorie->name = $request->name;
            $categorie->save();

            return $categorie;
       }catch(\Exception $e){
            return $e;
       }
    }

    public function deleteCategorie(Request $request, $id)
    {
        try{

            $request->validate([
                'name' => 'required|max:255',
            ]);

            $categorie = categorie::where('id', $id)->first();
            $categorie->delete();

            return $categorie;
        }catch(\Exception $e){
            return $e;
        }
    }
}
