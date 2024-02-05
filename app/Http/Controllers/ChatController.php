<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Chat;


class ChatController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


     /**
   *
   * @param  IlluminateHttpRequest  $request
   * @return IlluminateHttpResponse
   */
    public function chat_with(User $user) {
        $user_a = auth()->user();

        $user_b = $user;

        $chat = $user_a->chats()->wherehas('users', function ($q) use($user_b){
            $q->where('chat_user.user_id', $user_b->id);
        })->first();

        if (!$chat) {

            // $chat = Chat::create([]);
           $chat = \App\Models\Chat::create([]);
           $chat->users()->sync([$user_a->id, $user_b->id]);

        }

        // return Redirect::route('chat.show')->with($chat);
        return redirect()->route('chat.show', $chat);
    }

    public function show(Chat $chat) {
        abort_unless($chat->users->contains(auth()->id()), 403);

        return view('chat', [
            'chat' => $chat
        ]);
    }

}
