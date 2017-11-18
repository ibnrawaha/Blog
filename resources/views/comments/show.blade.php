

<h5 class="padding-headers">Add a comment</h5>
<div class=" d-flex justify-content-center ">

	<form action="{{route('comment.store', $post->id)}}" class="form-group " method="post">
		{!! csrf_field() !!}
		<textarea name="comment" id="" cols="80" rows="5" class="form-control" placeholder="Type a comment"></textarea>
		<input type="hidden" value="{{$post->id}}" name="post_id">

		<button class="btn btn-primary form-control" name="submit">Respond to this</button>
	</form>
</div>


@if(count($comments) < 1)
	<h6 class="bg-danger padding-headers">No one responded to this.</h6>
@else
@foreach($comments as $comment)
<div class="well">
	<div>
		<strong>{{ucwords($comment->user->name)}}</strong><br>
		<p>{{$comment->comment}}</p>
	</div>

	<!-- DELETE COMMENT *******************

	<div class="float-right">
		<form action="/posts/{{$post->id}}/comment/{{$comment->id}}" method="post" >
			{!! csrf_field() !!}
			{{ method_field('DELETE') }}

		  <button name="submit" class="btn btn-danger float-right">X</span>
		</form>
	</div>

	<div class="clearfix"></div>
	**************** END DELETE COMMENT -->
</div>	
@endforeach
@endif