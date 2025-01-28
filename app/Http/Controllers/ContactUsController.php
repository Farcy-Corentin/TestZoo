<?php

namespace App\Http\Controllers;

use App\Mail\SendArcadiaMail;
use App\Requests\ContactFormRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    public function show(): View
    {
        return view('page.contact');
    }

    public function send(ContactFormRequest $request): JsonResponse
    {
        try {
            Mail::to('jose@arcadia.mail')
                ->send(new SendArcadiaMail(
                    $request->name,
                    $request->email,
                    $request->message,
                ));
            session()->flash('success', 'Email envoyé avec succès !');
            return response()->json(['success' => 'Email envoyé avec succès !']);
        } catch (Exception) {
            session()->flash('error', "Erreur lors de l'envoi de l'email.");
            return response()->json(['error' => "Erreur lors de l'envoi de l'email."], 500);
        }
    }
}
