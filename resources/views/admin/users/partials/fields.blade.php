						<div class="form-group">
							{!! Form::label('email', 'Correo Electronico') !!}
						    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Intruduzca su email']) !!}
					  	</div>
					  	<div class="form-group">
						    {!! Form::label('password', 'Contraseña') !!}
						    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Intruduzca su clave']) !!}
					  	</div>
					  	<div class="form-group">
							{!! Form::label('name', 'Nombres') !!}
						    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Intruduzca sus Nombres']) !!}
					  	</div>
					  	<div class="form-group">
							{!! Form::label('type', 'Tipo de Usuario') !!}
						    {!! Form::select('type', config('options.types'), null ,['class' => 'form-control']) !!}
					  	</div>