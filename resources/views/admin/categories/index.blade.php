@extends('layouts.app')

@section('content')

	<div class="card">
		
		<div class="card-header"> <strong>All the blogs categories</strong> </div>
		
		<br>
		<a href="{{ route('categories.create') }}" class="btn btn-primary" 
		style="border-radius:0px;">Create a new category</a>

		<div class="card-body">
			
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Edit</th>
			      <th scope="col">Delete</th>
			    </tr>
			  </thead>
			  <tbody>
			   	
				@foreach($categories as $category)

					<tr>
				      <th scope="row">{{ $category->id }}</th>
				      <td>{{ $category->name }}</td>
				      <td>
				      	<a href="{{ route('categories.edit', $category) }}" class="btn btn-success">Edit</a>
				      </td>
				      <td>
				     	
						<form action="{{route('categories.destroy',$category) }}" method="POST">
							
							@csrf
							@method('DELETE')

							<button class="btn btn-danger">Delete</button>

						</form>

				      </td>
			    	</tr>

				@endforeach

			  </tbody>
			</table>
			
		</div>

	</div>

@endsection