<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Files;
use App\Models\UsersHasFiles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('dashboard.profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if($request->file){
            $file = new Files;

            if(auth()->user()->hasfiles)
                auth()->user()->hasfiles->delete();
                Storage::delete(auth()->user()->hasfiles->file->filename);
            
            try {
                $file->upload($file, $request->file);

                UsersHasFiles::create([
                    'users_id' => auth()->user()->id,
                    'files_id' => $file->id
                ]);

            } catch (\Throwable $th) {
                throw $th;
                Log::error($th);
                return redirect()->back()->with('error','Erro ao cadastrar imagem!');
            }
        }
        
        auth()->user()->update($request->all());

       return redirect()->back()->with('success','Dados atualizados com sucesso.');
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->with('success', 'Senha atualizada com sucesso.');
    }
}
