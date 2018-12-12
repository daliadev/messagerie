<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Repository\ConversationsRepository;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ConversationsController extends Controller
{

	private $repository;


	public function __construct (ConversationsRepository $repository)
  {
      $this->repository = $repository;
  }


	public function index (Request $request)
  {
  	// throw new \Exception();
  	
  	return response()
  		->json([
  			'conversations' => $this->repository->getConversations($request->user()->id)

  		]);
	}


	public function show (Request $request, User $user)
  {
      // $me = $this->auth->user();
      $messages = $this->repository->getMessagesFor($request->user()->id, $user->id)->get(); //->paginate(50);
      // $unread = $this->repository->unreadCount($me->id);
      // if (isset($unread[$user->id])) {
      //     $this->repository->readAllFrom($user->id, $me->id);
      //    unset($unread[$user->id]);
      // }

    return response()
			->json([
				'messages' => $messages->reverse()
		]);
  }

}