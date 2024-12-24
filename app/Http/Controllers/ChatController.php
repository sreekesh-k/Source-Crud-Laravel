<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\UsersChatTbl;
use App\Models\Sourcemembers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
     
    public function checkUser($id)
    {
        // Check if the user exists in users_chat_tbl
        $chatUser = UsersChatTbl::where('user_id', $id)->first();

        if ($chatUser) {
            // Redirect to chat page if user exists
            return redirect()->route('chatPage', ['id' => $id]);
        } else {
            // Redirect to a page to add the user to chat table
            return view('add_chat_user', ['id' => $id]);
        }
    }

    // Add user to chat table
    public function addUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:sourcemembers,id',
        ]);

        // Add user to users_chat_tbl
        UsersChatTbl::create([
            'user_id' => $request->user_id,
        ]);

        // Redirect to the chat page
        return redirect()->route('chatPage', ['id' => $request->user_id]);
    }

    // Show the chat page
    public function showChatPage($id)
    {
        // Fetch user details from sourcemembers
        $user = Sourcemembers::findOrFail($id);
    
        return view('chat', ['user' => $user]);
    }
    
}
