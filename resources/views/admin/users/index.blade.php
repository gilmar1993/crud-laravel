@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">USUARIOS</div>

				@if(Session::has('message'))
					{{ Session::get('message') }}
				@endif
				
				<div class="panel-body">
				<a class="btn btn-success" href="{{ route('admin.users.create') }}">Crear Usuarios</a>

					<div class="panel-body">
					{!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
						<div class="form-group">
							{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario']) !!}
							{!! Form::select('type', config('options.types'), null, ['class' => 'form-control']) !!}
						</div>
						<button type="submit" class="btn btn-default">BUSCAR</button>
					{!! Form::close() !!}
					</div>

					Hay {{ $users->lastPage() }} paginas
					de {{ $users->total() }} usuarios

					@include('admin.users.partials.table')
					<!-- Paginacion de usuarios -->				
					{!! $users->appends(Request::only(['type']))->render() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

{!! Form::open(['route' => ['admin.users.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}

@section('scripts')
<script>
	$(document).ready(function()
	{
		$('.btn-delete').click(function (e)
		{
			e.preventDefault();

			var row = $(this).parents('tr');
			var id = row.data('id');
			var form = $('#form-delete');
			var url = form.attr('action').replace(':USER_ID',id);
			var data = form.serialize();

			row.fadeOut();

			$.post(url, data, function (result) 
			{
				alert(result.message);
			}).fail(function ()
			{
				alert("El usuario no fue eliminado");
				row.show();
			})
		});
	});
</script>
@endsection
