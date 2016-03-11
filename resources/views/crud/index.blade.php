@extends('layouts.master')
@section('content')
<style>
  .navBar li:first-child { padding-bottom: 5px; border-bottom: 2px solid #fff; }
</style>
<div class="container">

  @if(Session::has('flash_message'))
  <div class="alert alert-danger" style="margin-top: 20px;">
    {{ Session::get('flash_messages') }}
  </div>
  @endif
  {!! Form::open([ 'route' => 'crud.index' ,'method' => 'GET' ])!!}

  {!! Form::text('student_fname', '', array ( 'class' => 'form-control'  ) ); !!}
  {!! Form::submit('Submit', array( 'class' => 'btn btn-success srchBtn' )); !!}

  {!! Form::close() !!}

  <div class="table" style="margin-top: 20px;">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="background-color:#ccc;">Picture</th>
          <th style="background-color:#ccc;">Firstname</th>
          <th style="background-color:#ccc;">Middlename</th>
          <th style="background-color:#ccc;">Lastname</th>
          <th style="background-color:#ccc;">Gender</th>
          <th style="background-color:#ccc;">Address</th>
          <th style="background-color:#ccc;">Course</th>
          <th style="background-color:#ccc;">School</th>
          <th style="background-color:#ccc;">Actions</th>
        </tr>
      </thead>
      <tbody>
           @if($count = 0) @endif
            @foreach($crud as $value)
            @if($count++) @endif
        <td><img src="{{ $value->student_image }}" class="img-responsive" alt=""></td>
              <td>{{ $value->student_fname }}</td>
              <td>{{ $value->student_mname }}</td>
              <td>{{ $value->student_lname }}</td>
              <td>{{ $value->student_gender }}</td>
              <td>{{ $value->student_address }}</td>
              <td>{{ $value->student_course }}</td>
              <td>{{ $value->student_school }}</td>
              <td>
                <a href="{{ route('crud.create') }}" class="btn btn-success">ADD</a>
                <a href="{{ route('crud.edit', $value->student_id) }}" class="btn btn-primary">EDIT</a>
                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['crud.destroy', $value->student_id]
                ]) !!}
                {!! Form::submit('DELETE', ['class' => 'btn btn-danger btnDel', 'style' => 'float:left']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
      <div class="alert">found result {{ $count }}</div>
      </tbody>
    </table>
    
  </div>
</div>

@endsection