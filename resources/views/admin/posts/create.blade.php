@extends('layouts.app')

@section('content')

	<div class="card">
		
		<div class="card-header"> <strong>Create new post</strong> </div>

		<div class="card-body">
			
			<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
				
				@csrf

				<div class="form-group">
					
					<label for="title">Title</label>

					<input type="text" name="title" class="form-control" >

				</div>

				<div class="form-group">
					
					<label for="featured">Featured image</label>

					<input type="file" name="featured" class="form-control-file" >

				</div>

				<div class="form-group">
					
					<label for="content">Content</label>

					<textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>

				</div>

				<div class="form-group">
					
					<div class="text-center">
						
						<button class="btn btn-success">Create Post</button>

					</div>

				</div>

			</form>

			@include("includes.errors")

		</div>

	</div>

@endsection