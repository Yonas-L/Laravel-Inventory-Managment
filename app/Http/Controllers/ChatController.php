<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Termwind\Components\Dd;
use App\Events\MessageCreated;
use Illuminate\Support\Facades\Broadcast;
use Inertia\Inertia;
use Pusher\Pusher;

use function Termwind\render;

class ChatController extends Controller
{

    //* View User chats
    public function index($toId)
    {
        $messages = Chat::where('from', Auth::user()->id)->where('to', $toId)->orWhere('from', $toId)->where('to', Auth::user()->id)->get();
        event(new MessageCreated($messages));
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
        event(new MessageCreated($chatMessage));
        return redirect()->back()->with(
            'conversations',
            $chatMessage,
        );
    }
}
