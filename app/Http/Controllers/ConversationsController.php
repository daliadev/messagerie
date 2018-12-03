<?php

namespace App\Http\Controllers;

use App\User;
// use App\Message;
use App\Repository\ConversationsRepository;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthManager;

class ConversationsController extends Controller
{

	private $repository;

	private $auth;


	public function __construct (ConversationsRepository $repository, AuthManager $auth)
    {
        $this->repository = $repository;
        $this->auth = $auth;
    }


    public function index ()
    {
    	return view('conversations/index', [
    		'users' => $this->repository->getConversations($this->auth->user()->id),
            'unread' => $this->repository->unreadCount($this->auth->user()->id)
    	]);
    }


    public function show (User $user)
    {
        $me = $this->auth->user();
        $messages = $this->repository->getMessagesFor($me->id, $user->id)->paginate(50);
        $unread = $this->repository->unreadCount($me->id);
        if (isset($unread[$user->id])) {
            $this->repository->readAllFrom($user->id, $me->id);
           unset($unread[$user->id]);
        }

    	return view('conversations/show', [
    		'users' => $this->repository->getConversations($this->auth->user()->id),
    		'user' => $user,
            'messages' => $messages,
            'unread' => $unread
    	]);
    }


    public function store (User $user, StoreMessageRequest $request)
    {
    	$message = $this->repository->createMessage(
            $request->get('content'), 
            $this->auth->user()->id,
            $user->id
        );

        $user->notify(new MessageReceived($message));
        
        return redirect(route('conversations.show', ['id' => $user->id]));
    }

}
