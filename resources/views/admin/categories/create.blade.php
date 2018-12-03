@extends('layouts.app')

@section('content')

	<div class="card">
		
		<div class="card-header"> <strong>Create new category</strong> </div>

		<div class="card-body">
			
			<form action="{{ route('categories.store') }}" method="POST">
				
				@csrf

				<div class="form-group">
					
					<label for="name">Name</label>

					<input type="text" name="name" class="form-control" >

				</div>

				<div class="form-group">
					
					<div class="text-center">
						
						<button class="btn btn-success">Create category</button>

					</div>

				</div>

			</form>

			<div>
				
				@foreach($errors->all() as $error)

					<li>{{ $error}}</li>

				@endforeach

			</div>

		</div>

	</div>

@endsection