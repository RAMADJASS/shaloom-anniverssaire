<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Mail\InvitationResponseMail;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function form()
    {
        return view('form');
    }

    public function store(Request $request)
{
    $invitation = Invitation::create([
        'prenom' => $request->prenom,
        'nom' => $request->nom,
        'participation' => $request->participation,
        'disponible' => $request->disponible,
        'gele' => $request->gele,
        'respect' => $request->respect,
        'boisson' => $request->boisson,
        'accompagnement' => $request->accompagnement,
    ]);

    Mail::to('Ryanediangu@gmail.com')
        ->send(new InvitationResponseMail($invitation));

    return redirect()->route('thankyou');
}
public function thankyou()
{
    return view('thankyou');
}
}