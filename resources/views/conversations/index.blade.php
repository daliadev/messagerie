
@extends('layouts.app')

@section('content')
	
	<div id="messagerie" class="container" data-base="{{ route('conversations', [], false) }}">
		<Messagerie :user="{{ Auth::user()->id }}"></Messagerie>
	</div>

@endsection