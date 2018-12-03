@extends('layouts.app')

@section('content')

	<div class="card">
		
		<div class="card-header"> <strong>All the Blog posts</strong> </div>
		
		<br>
		<a href="{{ route('posts.create') }}" class="btn btn-primary" 
		style="border-radius:0px;">Create a new blog post</a>

		<div class="card-body">

			@if(count($posts))
			
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Image</th>
			      <th scope="col">Title</th>
			      <th scope="col">Edit</th>
			      <th scope="col">Trash</th>
			    </tr>
			  </thead>
			  <tbody>
			   	
				@foreach($posts as $post)

					<tr>
				      <th scope="row">
				      	<img src="{{ $post->featured }}" alt=" {{ $post->title }}" 
				      	width="70px" height="70px">
				      </th>
				      <td>{{ $post->title }}</td>
				      <td>
				      	<a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-success">Edit</a>
				      </td>
				      <td>

						<form action="{{ route('posts.destroy',$post) }}" method="POST">
							
							@csrf
							@method('DELETE')

							<button class="btn btn-sm btn-danger">Trash</button>

						</form>

				      </td>
			    	</tr>

				@endforeach

			  </tbody>
			</table>
			
			@else

				<div class="alert alert-info" role="alert">
  					You have no posts :(
				</div>

			@endif

		</div>

	</div>

@endsection