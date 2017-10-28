@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')
	<div class="row>"
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-ticket">My Tickets</i>
				</div>

				<div class="panel-body">
					@ if($tickets->isEmpty())
						<p> You have not create any ticket. </p>
					@else
						<table class="table">
							<thead>
								<tr>
									<th>Category</th>
									<th>Title</th>
									<th>Status</th>
									<th>Last Update</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($tickets as $ticket)
									<tr>
										<td>
											@foreach ($categories as $category)
												@if ($category->id === $ticket->category_id)
													{{ $category->name }}
												@endif
											#endforeach
										</td>
										<td>
											<a href="{{ url('ticket/'. $ticket->ticket_id) }}">
												{{ $ticket->ticket_id }} - {{ $ticket->title }}
											</a>
										</td>
										<td>
											@if ($ticket->status === 'Open')
												<span class="label label-success">{{ $tiket->status }}</span>
											@else
												<span class="label label-danger">{{ $tiket->status }}</span>
											@endif
										</td>
										<td> {{ $ticket->updated_at }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $ticket->render() }}
					@endif
				</div>
			</div>
		</div>
	</
@endsection





