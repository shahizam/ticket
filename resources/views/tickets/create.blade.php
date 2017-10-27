@extend('layout.app')

@section('title', 'Open Ticket')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Open New Ticket</div>

				<div class="panel-body">
					@include('include.flash')

					<form class="form-horizontal" role="form" method="post" action="{{ route('store_ticket') }}">
						{!! csrf_field() !!}

						<div class="form-group{{ $error->has('title') ? ' has error' : '' }}">
							<label for="title" class="col-md-4 control-label">Title</label>

							<div class="col-md-6">
								<input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

								@if ($error->has('title'))
									<span class="help-block">
										<strong>{{ $error->first('title') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $error->has('category') ? ' has error' : '' }}">
							<label for="category" class="col-md-4 control-label">Category</label>

							<div class="col-md-6">
								<select id="category" type="" class="form-control" name="category">
									<option value="">Select Category</option>
									@foreach ($categories as $catagory)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>

								@if ($error->has('category'))
									<span class="help-block">
										<strong>{{ $error->first('category') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $error->has('priority') ? ' has error' : '' }}">
							<label for="priority" class="col-md-4 control-label">Priority</label>

							<div class="col-md-6">
								<select id="priority" type="" class="form-control" name="priority">
									<option value="">Select Priority</option>
									<option value="low">Low</option>
									<option value="medium">Medium</option>
									<option value="high">High</option>
								</select>

								@if ($error->has('priority'))
									<span class="help-block">
										<strong>{{ $error->first('priority') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $error->has('message') ? ' has error' : '' }}">
							<label for="message" class="col-md-4 control-label">Message</label>

							<div class="col-md-6">
								<textarea rows="10" id="message" class="form-control" name="message"></textarea>

								@if ($error->has('message'))
									<span class="help-block">
										<strong>{{ $error->first('message') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6">
								<button  type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-ticket">Open Ticket</i>
								</button> 

							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
@endsection