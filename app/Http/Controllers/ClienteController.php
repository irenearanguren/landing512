<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClienteController extends Controller
{
    public function invitado(){
        return view('user.invitado');
    }
    public function cliente(){
        return view('user.cliente');
    }
    public function perfil(){
        return view('user.perfil');
    }
    public function contacto(){
        return view('user.contacto');
    }

    public function logout(){
        session()->flush();
    }
    public function enviarComentario(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('admin@catalogo.com')
                    ->subject('Contacto de ' . $data['name'].' de catalogo');
        });

        return redirect()->back()->with('success', 'Comentario enviado con éxito.');
    }
}
 