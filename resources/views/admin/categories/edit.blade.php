@extends('layouts.app')

@section('content')

	<div class="card">
		
		<div class="card-header"> <strong>Edit category</strong> </div>

		<div class="card-body">
			
			<form action="{{ route('categories.update',$category) }}" method="POST">
				
				@csrf
				@method('PATCH')

				<div class="form-group">
					
					<label for="name">Name</label>

					<input type="text" name="name" class="form-control" value="{{ $category->name }}">

				</div>

				<div class="form-group">
					
					<div class="text-center">
						
						<button class="btn btn-success">Edit category</button>

					</div>

				</div>

			</form>

			@include("includes.errors")

		</div>

	</div>

@endsection