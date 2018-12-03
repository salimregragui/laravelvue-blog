@extends('layouts.app')

@section('content')

	<div class="card">
		
		<div class="card-header"> <strong>Trashed Blog posts</strong> </div>
		
		<br>
		<a href="{{ route('posts.create') }}" class="btn btn-primary" 
		style="border-radius:0px;">Create a new blog post</a>

		<div class="card-body">
			
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Image</th>
			      <th scope="col">Title</th>
			      <th scope="col">Edit</th>
			      <th scope="col">Restore</th>
			      <th scope="col">Delete</th>
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

							<button class="btn btn-sm btn-info">Restore</button>

						</form>

				      </td>

				      <td>

						<a href="{{ route('posts.kill',$post) }}" class="btn btn-sm btn-danger">Delete</a>

				      </td>
			    	</tr>

				@endforeach

			  </tbody>
			</table>
			
		</div>

	</div>

@endsection