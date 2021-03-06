@extends('adminlte::page')

@section('title', 'Редактировать запись')

@section('content_header')
    <h1>Редактировать пользователя</h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="form">
                <div class="box-body">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $user->name ?: old('name')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{!! $user->email ?: old('email')  !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <select name="roles[]" id="roles" class="form-control select2" multiple>
                            @foreach($roles as $role)
                                <option @if(in_array($role->id, $selected_roles))selected="selected" @endif value="{{ $role->id }}">{{ $role->display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">

                        <a href="{{url()->previous()==url()->current()?route('admin.users.index'):url()->previous() }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection


@section('js')
    <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/js/ckeditor/ru.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    @endsection