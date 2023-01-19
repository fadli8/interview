<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Exception;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function getProducts()
    {
        try{
            $produits = Produit::with(['categorie'])->get();
            // return $produits;
            $res = array();
            foreach ($produits as $row ) {

                array_push($res, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'slug' => $row['slug'],
                    'stock' => $row['stock'],
                    'catego' => $row['categorie_id'],
                    'categrie_name' => ($row['categorie'] != null)?$row['categorie']['name']:null,
                ]);
            }

            return $res;
        }catch(Exception $e){
            return $e;
        }

    }

    public function addProduct(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:produits',
                'stock' => 'required|integer',
                'categorie_id' => 'required'
            ]);

            $produit = new Produit();
            $produit->name = $request->name;
            $produit->slug = $request->slug ."_". random_int(0, 100);
            $produit->stock = $request->stock;
            $produit->categorie_id = $request->categorie_id;
            
            $produit->save();

            return $produit;
       } catch (\Exception $e) {
            return $e;
       }
    }

    public function updateProduct(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:produits',
                'stock' => 'required|integer',
                'categorie_id' => 'required'
            ]);
    
            $produit = Produit::where('id', $id)->first();
            $produit->name = $request->name;
            $produit->slug = $request->slug;
            $produit->stock = $request->stock;
            $produit->categorie_id = $request->categorie;
            $produit->save();
    
            return $produit;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function deleteProduct(Request $request, $id)
    {
        try{
            $produit = Produit::where('id', $id)->first();
            $produit->delete();

            return $produit;
        }catch(\Exception $e){
            return $e;
        }
    }
}
