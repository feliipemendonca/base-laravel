<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlidesRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Files;
use App\Models\Slides;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    
    public function index()
    {
        return view('dashboard.slides.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlidesRequest $request)
    {
        $file = new Files;
        try {
            $file->upload($file, $request->file);
            $request['files_id'] = $file->id;
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error','Erro ao cadastrar imagem!');
        }

        try{
            Slides::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->with('error','Erro ao cadastrar slide. Por favor entrar em contao com o suporte!');
        }

        return redirect()->route('dashboard.slides.index')->with('success','Slide cadatrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function show(Slides $slides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function edit(Slides $slide)
    {
        return view('dashboard.slides.edit',['item' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function update(SlidesRequest $request, Slides $slide)
    {
        if($request->file):
            $file = new Files;
            try {
                Storage::delete($slide->files->filename);
                $file->upload($file, $request->file);
            } catch (\Throwable $th) {
                // throw $th;
                return redirect()->back()->with('error','Erro ao atualizar imagem!');
            }

            $slide->files_id = $file->id;

        endif;

        $slide->setData($slide, $request->all());

        try{
            $slide->save();
        }catch(\Exception $e){
            // dd($e);
            return redirect()->back()->with('error','Erro ao atualizar slide. Por favor entrar em contao com o suporte!');
        }

        return redirect()->route('dashboard.slides.index')->with('success','Slide atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slides $slide)
    {
        try {
            Storage::delete($slide->files->filename);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error','Erro ao apagar imagem. Por favor entrar em contao com o suporte!');
        }
        try{
            $slide->delete();
        }catch(\Exception $e){
            return redirect()->back()->with('error','Erro ao atualizar slide. Por favor entrar em contao com o suporte!');
        }

        return redirect()->route('dashboard.slides.index')->with('success','Slide apagado com sucesso!');
    }
}
