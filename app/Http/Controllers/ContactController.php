<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function showForm(){
        return view('email.contact');
    }

    public function send(Request $request){
        $request->validate([
            'message' =>'required|min:5',
            'email'   =>'required|email'
        ]);
        Mail::to('aichaelyadri60@gmail.com')
        ->send(new ContactMessage($request->message ,$request->email));
        return back()->with('success','message envoye avec success 🌿');
    }
}
