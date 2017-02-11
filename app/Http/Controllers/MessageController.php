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

	/**
	 * Encrypt or Decrypt message based on offset.
	 *
	 * @param string $msg The message to encrypt.
	 * @param int $offset How much offset to apply.
	 * @return string $msg The crypted message.
	 **/
	private function caesarCrypting($msg, $offset)
	{
		$alphaLower = range('a','z');
		$alphaUpper = range('A','Z');
		$msgLen = strLen($msg);
		$i = 0;
		while ($i < $msgLen){
			if(in_array($msg[$i], $alphaLower)){
				$asciiValue = ord($msg[$i]) + $offset;		
				if($asciiValue > ord('z')){
					$asciiValue = $asciiValue - ord('z') + 96;
				}elseif($asciiValue < ord('a')){
					$asciiValue = $asciiValue + ord('z') - 96;
				}
				$msg[$i] = chr($asciiValue);
			}elseif(in_array($msg[$i], $alphaUpper)){
				$asciiValue = ord($msg[$i]) + $offset;
				if($asciiValue > ord('Z')){
					$asciiValue = $asciiValue - ord('Z') + 64;
				}elseif($asciiValue < ord('A')){
					$asciiValue = $asciiValue + ord('Z') - 64;
				}
				$msg[$i] = chr($asciiValue);
			}
			$i++;
		}
		return $msg;
	}

	public function newMessage(Request $request)
	{
		$message = new Message;
		$message->message = $this->caesarCrypting($request->message, $request->offset);
		$message->save();
		return redirect()->route('home');
	}
	
	public function decryptMessage(Request $request){
		$message = Message::find($request->id)->message;
		$offset = intval($request->offset) * -1;
		return response($this->caesarCrypting($message, $offset));	
	}	
}