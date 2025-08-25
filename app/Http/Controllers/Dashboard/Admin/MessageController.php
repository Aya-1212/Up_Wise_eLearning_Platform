<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->paginate(10);
        return view('dashboard.admin.messages.index', compact('messages'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return to_route('messages.index')->with('success', 'Message deleted successfully.');
    }
}
