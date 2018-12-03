@extends('layouts.app')

@section('content')

	<div class="card">
		
		<div class="card-header"> <strong>Edit post</strong> </div>

		<div class="card-body">
			
			<form action="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data">
				
				@csrf
				@method('PATCH')

				<div class="form-group">
					
					<label for="title">Title :</label>

					<input type="text" name="title" value="{{ $post->title }}" class="form-control" >

				</div>

				<div class="form-group">
					
					<label for="featured">Featured image :</label>

					<input type="file" name="featured" class="form-control-file" >

				</div>

				<div class="form-group">
					
					<label for="category">Select a Category :</label>

					<select class="form-control" id="category" name="category_id">
				      	@foreach($categories as $category)

							<option value="{{ $category->id }}">{{ $category->name }}</option>

				      	@endforeach
				    </select>

				</div>

				<div class="form-group">
					
					<label for="content">Content :</label>

					<textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>

				</div>

				<div class="form-group">
					
					<div class="text-center">
						
						<button class="btn btn-success">Edit Post</button>

					</div>

				</div>

			</form>

			@include("includes.errors")

		</div>

	</div>

@endsection