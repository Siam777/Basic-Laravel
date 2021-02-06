@extends('welcome')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<a href="{{ route('add.category') }}" class="btn btn-danger">Add category</a>
			<a href="{{ route('all.category') }}" class="btn btn-info">All Category</a>
			<a href="{{ route('all.post') }}" class="btn btn-info"> All Post</a>			
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
			<form action={{ route('store.post') }} method="post" name="sentMessage" id="contactForm" enctype="multipart/form-data">
				@csrf
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
                       <label>Post Title</label>
                       <input type="text" class="form-control" placeholder="Title" id="title" name="title" required                        />
                   </div>
                       
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
                       <label>Post Title</label>
                       <select class="form-control" name="category_id">
                       	@foreach($category as $row)
                       	 <option value="{{ $row->id }}">{{ $row->name }}</option>
                       	 @endforeach
                       </select>
                   </div>                      
				</div>
								
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
                       <label>Post Image</label>
                       <input type="file" class="form-control" name="image" required>
                        <p class="help-block text-danger"></p>
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
                       <label>Post Details</label>
                       <textarea class="form-control" placeholder="Details" name="details" required
                        ></textarea>                         
					</div>
				</div>
				<div id="success"></div>
				<div class="fom-group">
					<button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
				</div> 
			</form>
		</div>
	</div>
</div>
@endsection
