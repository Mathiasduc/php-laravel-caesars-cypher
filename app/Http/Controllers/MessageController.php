<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
	public function getHome()
	{	
		$messages = Message::all();
		return view('home', ['messages'=>$messages]);
	}

	public function newMessage(Request $request)
	{
		$message = $request->message;
		dd($message);
	}
}