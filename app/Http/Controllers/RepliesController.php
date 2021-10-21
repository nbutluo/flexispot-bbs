<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use App\Notifications\ReplyUpdated;
use App\Notifications\ReplyLiked;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['toggleLike']]);
    }

    public function store(ReplyRequest $request, Reply $reply)
    {
        $reply->content = $request->content;
        $reply->user_id = Auth::id();
        $reply->topic_id = $request->topic_id;
        $reply->save();

        return redirect()->to($reply->topic->link())->with('success', 'Comment created successfully!');
    }

    public function subrepliestore(ReplyRequest $request, Reply $reply)
    {
        $reply->fill($request->all());
        $reply->user_id = Auth::id();
        $reply->save();

        return redirect()->back()->with('success', 'The comment reply was successful!');
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return redirect()->to($reply->topic->link())->with('success', 'Comment deleted successfully!');
    }

    public function toggleLike(Reply $reply)
    {
        if (!Auth::check()) {
            $data['code'] = 0;
        } else {
            $data['code'] = 1;
            $data['res'] = Auth::user()->toggleLike($reply);
            $reply->updateLikeCount();
        }

        echo json_encode($data);
    }
}
