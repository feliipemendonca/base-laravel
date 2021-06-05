<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Files;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsConttoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $file = new Files;

        try {
            $file->upload($file, $request->file);
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error','Erro ao cadastrar imagem!');
        }

        $request['files_id'] = $file->id; 
        try {
            Products::create($request->all());
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error','Erro ao cadastrar produto!');
        }

        return redirect()->route('dashboard.products.index')->with('success','Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('dashboard.products.edit',['item' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, Products $product)
    {
        if($request->file):
            $file = new Files;

            try {
                Storage::delete($product->files->filename);
                $file->upload($file, $request->file);
            } catch (\Throwable $th) {
                // throw $th;
                return redirect()->back()->with('error','Erro ao atualizar imagem!');
            }

            $request['files_id'] = $file->id;

        endif;
        
        try {
            $product->update($request->all());
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error','Erro ao atualizar produto!');
        }

        return redirect()->route('dashboard.products.index')->with('success','Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        try {
            Storage::delete($product->files->filename);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error','Erro ao apagar imagem. Por favor entrar em contao com o suporte!');
        }
        try {
            $product->delete();
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error','Erro ao excluir produto!');
        }

        return redirect()->route('dashboard.products.index')->with('success','Produto excluído com sucesso!');
    }
}
