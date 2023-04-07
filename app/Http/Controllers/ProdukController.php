<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\produc;
use Illuminate\Support\Facades\File;
use App\Models\Categori;


class ProdukController extends Controller
{
    public function index(){
        $data=produc::with('categoris')->get();
        return view('proses.produk.listproduc',compact(['data']));
    }

    public function show(){

        $data['categoris']= Categori::All();
        $data['producs']= produc::All();

        return view('proses.produk.indexproduk',$data);
    }

    public function store(Request $request)
    {
        {$file= $request->file('ganbar');
            $gambar=time()."_".$file->getClientOriginalName();
             $tujuan_upload='file/produk';
             $file->move(public_path($tujuan_upload),$gambar);

             $validated= $request->validate([
                'name'=>['required','string','max:100'],
                'price'=>['required','numeric'],
                'description'=>['required'],
                'categori_id'=>['required'],
            ]);
     
            produc:: create ([
            'name'=>$validated['name'],
            'price'=>$validated['price'],
            'description'=>$validated['description'],
            'categori_id'=>$validated['categori_id'],
            'ganbar'=>$gambar,
             ]);
             return redirect()->back();
         }
    }

    public function edit($id){
        $edit['producs']=produc::find($id);
        $edit['categoris']=Categori::All();
        return view('proses.produk.editproduk',$edit);
    }

    public function update(Request $request,$id){
        $post = produc::find($id);
        if ($request->hasFile('ganbar')){
            $file= $request->file('ganbar');
            $produk_file= time()."_".$file->getClientOriginalName();
            $tujuan_upload='file/produk';
            $file->move(public_path($tujuan_upload),$produk_file);
            File::delete('file/produk', $produk_file);
        

            $post->name= $request->name;
            $post->description=$request->description;
            $post->price=$request->price;
            $post->categori_id=$request->categori_id;
            $post->ganbar=$produk_file;
            $post->save();
        }else{
            $post->name= $request->name;
            $post->description=$request->description;
            $post->price=$request->price;
            $post->categori_id=$request->categori_id; 
            $post->save();
        }
        return redirect('/produk');
    }

    public function destroy(Request $request, $id){
        {
            $produk=produc::Findorfail($id);
            $file=public_path('file/produk').$produk->ganbar;
            if(file_exists($file)){
                @unlink($file);
            }
            $produk->delete();
            return redirect('/produk');
        }

    }
}
