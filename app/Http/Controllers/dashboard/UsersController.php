<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Files;
use App\Models\Roles;
use App\Models\User;
use App\Models\UsersHasFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    
    public function index()
    {
        return view('dashboard.users.index');
    }

    
    public function create()
    {
        return view('dashboard.users.create',[
            'items' => Roles::orderBy('title','asc')->get()
        ]);
    }

    
    public function store(Request $request)
    {
        $file = new Files;
        $user = new User;

        try {
            $file->upload($file, $request->file);

        } catch (\Throwable $th) {
            // throw $th;
            Log::error($th);
            return redirect()->back()->with('error','Erro ao cadastrar imagem!');

        }

        try {
            $user->setData($user, $request->all());
            $user->save();

            UsersHasFiles::create([
                'users_id' => $user->id,
                'files_id' => $file->id
            ]);

        } catch (\Throwable $th) {
            //throw $th;

            Log::error($th);
            return back()->with('error','Erro ao cadastrar usuário. Por favor tente novamente.');

        }

        return redirect()->route('dashboard.users.index')->with('success','Usuário Criado com sucesso.');
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit',[
            'item' => $user
        ]);
    }


    public function update(Request $request, User $user)
    {
        if($request->file):

            $file = new Files;
            Storage::delete($user->hasfiles->file->filename);

            $user->hasfiles->delete();

            UsersHasFiles::create([
                'users_id' => $user->id,
                'files_id' => $file->id
            ]);

            try {
                $file->upload($file, $request->file);

            } catch (\Throwable $th) {

                // throw $th;
                Log::error($th);
                return redirect()->back()->with('error','Erro ao cadastrar imagem!');

            }

        endif;

        $user->setData($user, $request->all());

        try {
            $user->save();

        } catch (\Throwable $th) {

            //throw $th;
            Log::error($th);
            return back()->with('error','Erro ao atualizar dados de usuário. Por favor tente novamente.');

        }

        return redirect()->route('dashboard.users.index')->with('success','Usuário atualizado com sucesso.');
    }


    public function destroy(User $user)
    {
        try {
            Storage::delete($user->hasfiles->file->filename);
            $user->hasfiles->delete();
            $user->delete();

        } catch (\Throwable $th) {

            //throw $th;
            Log::error($th);
            return back()->with('error','Erro ao apagar usuário. Por favor tente novamente.');

        }

        return redirect()->route('dashboard.users.index')->with('success','Usuário apagado com sucesso.');
    }
}
