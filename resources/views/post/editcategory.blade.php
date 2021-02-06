@extends('welcome')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<a href="{{ route('add.category') }}" class="btn btn-danger">Add category</a>
			<a href="{{ route('all.category') }}" class="btn btn-info">All Category</a>
			<hr/>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form action="{{ url('update/category/'.$category->id)}}" method="post">
				@csrf
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Category Name</label>
						<input type="text" value="{{ $category->name }}" class="form-control" placeholder="Category Name" name="name"                         />
					</div>

				</div>

				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Slug Name</label>
						<input type="text" value="{{ $category->slug }}" class="form-control" placeholder="Slug Name" name="slug"                         />
					</div>

				</div>
				
				<div id="success"></div>
				<div class="fom-group">
					<button type="submit" class="btn btn-primary">Update</button>
				</div> 
			</form>
		</div>
	</div>
</div>
@endsection
