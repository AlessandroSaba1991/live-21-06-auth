<?php

namespace App\Http\Controllers;

use App\Mail\AdminContactMessage;
use App\Mail\ContactMessageConfirmation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.message-confirmation');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->all();
        $message = Message::create($data);
        Mail::to('admin@blog.com')->send(new AdminContactMessage($message));
        Mail::to($message->email)->send(new ContactMessageConfirmation($message));
        return redirect()->route('contact.form.index')->with('message', 'Message Received Contact you ASAP');
    }


}
