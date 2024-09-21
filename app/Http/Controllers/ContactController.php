<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function showContactForm()
    {
        // Generar dos números aleatorios entre 1 y 10
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        // Guardar la suma en la sesión
        Session::put('sum', $num1 + $num2);

        // Pasar los números a la vista
        return view('pages.contactanos', ['num1' => $num1, 'num2' => $num2]);
    }

    public function submitContactForm(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email',
            'subject' => 'required|regex:/^[\pL\s]+$/u',
            'message' => 'required',
            'human_check' => 'required|numeric',
        ]);

        // Verificar la respuesta de la suma
        $correctAnswer = Session::get('sum');
        if ($request->input('human_check') != $correctAnswer) {
            return redirect()->back()->withErrors(['human_check' => 'Respuesta incorrecta.']);
        }

        // Preparar y enviar el correo
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $mensaje = $request->message;

        $correo = new ContactanosMailable($name, $email, $mensaje, $subject);
        $correo->to('gonzalodiazster@gmail.com');
        $correo->from($request->email, $request->name);
        $correo->subject($request->subject);
        $correo->with('message', $request->message);

        Mail::send($correo);

        return redirect()->back()->with('mensaje', 'El correo electrónico ha sido enviado correctamente.');
    }

    public function showThankYouPage()
    {
        return view('thankyou');
    }
}