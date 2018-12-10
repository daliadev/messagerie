<?php

namespace App\Http\Controllers\Api;

use App\Repository\ConversationsRepository;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;


class ConversationsController extends Controller
{

	private $repository;


	public function __construct (ConversationsRepository $repository)
  {
      $this->repository = $repository;
  }


	public function index (Request $request)
  {
  	return response()
  		->json([
  			'conversations' => $this->repository->getConversations($request->user()->id)

  		]);
	}

}