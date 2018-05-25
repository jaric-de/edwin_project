<div class="col-sm-9">
    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email: ') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role: ') !!}
        {!! Form::select('role_id',['' => 'Choose options'] + $roles, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status: ') !!}
        {{-- третий параметр должен быть null. Если поставить key массива, то каждый раз будем его получать даже на странице edit.
         Без placeholder по умолчанию будет просто первый элемент  --}}
        {!! Form::select('is_active', [0 => 'Not Active', 1 => 'Active'], null, ['placeholder' => 'Pick a status...', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'File: ') !!}
        {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
    </div>

    @if (Route::currentRouteName() == 'users.create')
        <div class="form-group">
            {!! Form::label('password', 'Password: ') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    @endif()

    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>
</div>