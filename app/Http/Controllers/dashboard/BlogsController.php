<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogsRequest;
use App\Models\Blogs;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    
    public function index()
    {
        return view('dashboard.blog.index');
    }

    
    public function create()
    {
        return view('dashboard.blog.create');
    }

   
    public function store(BlogsRequest $request)
    {
        $file = new Files;

        try {
            $file->upload($file, $request->file);
        } catch (\Throwable $th) {
            // throw $th;
            Log::error($th);
            return redirect()->back()->with('error','Erro ao cadastrar imagem!');
        }

        $request['files_id'] = $file->id;
        $request['users_id'] = auth()->user()->id;

        try {
            Blogs::create($request->all());
        } catch (\Throwable $th) {
            // throw $th;
            Log::error($th);
            return redirect()->back()->with('error','Erro ao cadastrar blog!');
        }

        return redirect()->route('dashboard.blog.index')->with('success','Blog Cadastrado com sucesso!');
    }

    
    public function show(Blogs $blogs)
    {
        //
    }

   
    public function edit(Blogs $blog)
    {
        return view('dashboard.blog.edit',['item' => $blog]);
    }

 
    public function update(BlogsRequest $request, Blogs $blog)
    {
        if($request->file):
            $file = new Files;

            try {
                Storage::delete($blog->files->filename);
                $file->upload($file, $request->file);
            } catch (\Throwable $th) {
                throw $th;
                return redirect()->back()->with('error','Erro ao atualizar imagem!');
            }

            $request['files_id'] = $file->id;

        endif;
        
        try {
            $blog->update($request->all());
        } catch (\Throwable $th) {
            // throw $th;
            Log::error($th);
            return redirect()->back()->with('error','Erro ao atualizar blog!');
        }

        return redirect()->route('dashboard.blog.index')->with('success','Blog atualizado com sucesso!');
    }

    
    public function destroy(Blogs $blog)
    {
        try {
            Storage::delete($blog->files->filename);
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            return redirect()->back()->with('error','Erro ao apagar imagem. Por favor entrar em contao com o suporte!');
        }

        try {
            $blog->delete();
        } catch (\Throwable $th) {
            // throw $th;
            Log::error($th);
            return redirect()->back()->with('error','Erro ao excluir blog!');
        }

        return redirect()->route('dashboard.blog.index')->with('success','Blog excluído com sucesso!');
    }
}
