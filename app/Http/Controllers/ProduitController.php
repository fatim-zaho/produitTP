<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vars =Produit::all();
        return view('pro.index',compact('vars'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' =>'required',
            'description'=>'required',
            'quantite'=>['required','integer'],
            'prix'=>['required','integer'],
            
            

        ]);

        $profileImage = date('YmdHis') . "." . $request->image->getClientOriginalExtension();
        $request->file('image')->move('image/', $profileImage);


       Produit::create([
        'nom'=>$request->nom,
        'description'=>$request->description,
        'quantite'=>$request->quantite,
        'prix'=>$request->prix,
        'image' => $profileImage,
       ]);
       return redirect()->route('pro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $var =Produit::findorfail($id);
        return view('pro.edit',compact('var'));
       
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $var =Produit::findorfail($id);
        $request->validate([
            'nom' =>'required',
            'description'=>'required',
            'quantite'=>['required','integer'],
            'prix'=>['required','integer'],
            

        ]);


        $var->update([
            'nom'=>$request->nom,
            'description'=>$request->description,
            'quantite'=>$request->quantite,
            'prix'=>$request->prix,
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validatedData['image'] = "$profileImage";
        }
        return redirect()->route('pro.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Produit::findorfail($id)->delete();
        Produit::destroy($id);
        return redirect()->route('pro.index');
        
    }
}
