<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori =Categori::orderBy('id','asc')->get();
        return view('proses.categori.index',compact(['kategori']));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {$file= $request->file('gambar');
            $gambar= time()."_".$file->getClientOriginalName();
             $tujuan_upload='file/categori';
             $file->move(public_path($tujuan_upload),$gambar);

             $validated= $request->validate([
                'name'=>['required','string','max:100'],
                'description'=>['required'],
            ]);
     
            categori:: create ([
            'name'=>$validated['name'],
            'description'=>$validated['description'],
            'gambar'=>$gambar,
             ]);
             return redirect()->back();
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(categori $categori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit=Categori::find($id);
        return view('proses.categori.edit',compact(['edit']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $post = Categori::find($id);
        if ($request->hasFile('gambar')){
            $file= $request->file('gambar');
            $Categori_file= time()."_".$file->getClientOriginalName();
            $tujuan_upload='file/categori';
            $file->move(public_path($tujuan_upload),$Categori_file);
            File::delete('file/categori', $Categori_file);
        

            $post->name= $request->name;
            $post->description=$request->description;
            $post->gambar=$Categori_file;
            $post->save();
        }else{
            $post->name= $request->name;
            $post->description=$request->description;
            $post->save();
        }
        return redirect('/categori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        Categori::Where('id',$id)->delete();
        File::delete('file/categori');
        return redirect('/categori');
    }
}
