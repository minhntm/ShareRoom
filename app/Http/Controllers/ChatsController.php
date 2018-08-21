<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Input;

class ChatsController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('chat.list', compact('users'));
    }

    public function chat($to)
    {
        $name = User::whereId($to)->firstOrFail()->name;
        return view('chat.index', compact('to', 'name'));
    }

    public function fetchMessages()
    {
        $toId = Input::get('to_id');
        $messages = Message::where('from', Auth::id())
            ->where('to', $toId)
            ->orWhere(function ($query) use ($toId) {
                $query->where('from', $toId)
                    ->where('to', Auth::id());
            })
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        return $messages;
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $toId  = $request->input('to_id');
        $toUser = User::findOrFail($toId);
        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'to' => $toId,
        ]);
        broadcast(new MessageSent($user, $message, $toUser))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
