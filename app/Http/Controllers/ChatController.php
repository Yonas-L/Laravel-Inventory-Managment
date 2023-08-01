<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Termwind\Components\Dd;

class ChatController extends Controller
{

    //* View User chats
    public function index($toId)
    {
        $messages = Chat::where('from', Auth::user()->id)->where('to', $toId)->orWhere('from', $toId)->where('to', Auth::user()->id)->get();
        return redirect()->back()->with(
            'conversations',
            $messages,

        );
    }


    //* Storing the message 
    public function sendMessage(Request $request, $reciverId)
    {
        // validating the message
        $request->validate(['text' => ['required']]);


        $chatMessage = new Chat();
        $chatMessage->text = $request->text;
        $chatMessage->from = Auth::user()->id;
        $chatMessage->to = $reciverId;
        $chatMessage->save();
        // dd($chatMessage);
        // Trigger and broadcast the MessageSent event.
        return to_route('home')->with('conversations',$chatMessage);
    }
}
