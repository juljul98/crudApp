@extends('layouts.master')
@section('content')
{!! Form::open(array( 'route' => 'crud.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal frmRegistration', 'role' => 'form') ); !!}



<div class="container" style="margin-top: 30px;">
  @if (Session::has('flash_message'))
  <div class="alert alert-success" style="margin-top: 20px;">
    {{ Session::get('flash_message') }}
  </div>
  @endif
    <div class="form-group">
      {!! Form::label('student_fname', 'First Name', array ( 'class' => 'control-label col-sm-2') ); !!}
      <div class="col-sm-10">
        {!! Form::text('student_fname', '', array ( 'class' => 'form-control'  ) ); !!}
      </div>
    </div>
      @if($errors->any())
        @foreach($errors->get('student_fname') as $error)
          <div class="alert alert-danger">
            <p>{{ 'Kailangan to kulit ah' }}</p>
          </div>
        @endforeach
      @endif
    <div class="form-group">
      {!! Form::label('student_mname', 'Middle Name', array ( 'class' => 'control-label col-sm-2') ); !!}
      <div class="col-sm-10">
        {!! Form::text('student_mname', '', array ( 'class' => 'form-control'  ) ); !!}
      </div>
    </div>
    @if($errors->any())
      @foreach($errors->get('student_mname') as $error)
        <div class="alert alert-danger">
          <p>{{ 'Kailangan to kulit ah' }}</p>
        </div>
      @endforeach
    @endif
    <div class="form-group">
      {!! Form::label('student_lname', 'Last Name', array ( 'class' => 'control-label col-sm-2') ); !!}
      <div class="col-sm-10">
        {!! Form::text('student_lname', '', array ( 'class' => 'form-control'  ) ); !!}
      </div>
    </div>
    @if($errors->any())
      @foreach($errors->get('student_lname') as $error)
        <div class="alert alert-danger">
          <p>{{ 'Kailangan to kulit ah' }}</p>
        </div>
      @endforeach
    @endif
    <div class="form-group">
      {!! Form::label('student_gender', 'Gender', array ( 'class' => 'control-label col-sm-2' ) ); !!}
      <div class="col-sm-10">
        {!! Form::select('student_gender', array(
        'male' => 'Male',
        'female' => 'Female',
        )); !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('student_address', 'Student Address', array ( 'class' => 'control-label col-sm-2' ) ); !!}
      <div class="col-sm-10">
        {!! Form::text('student_address', '', array ( 'class' => 'form-control'  ) ); !!}
      </div>
    </div>
    @if($errors->any())
      @foreach($errors->get('student_address') as $error)
        <div class="alert alert-danger">
          <p>{{ 'Kailangan to kulit ah' }}</p>
        </div>
      @endforeach
    @endif
    <div class="form-group">
      {!! Form::label('student_course', 'Student Course', array ( 'class' => 'control-label col-sm-2' ) ); !!}
      <div class="col-sm-10">
        {!! Form::text('student_course', '', array ( 'class' => 'form-control'  ) ); !!}
      </div>
    </div>
    @if($errors->any())
      @foreach($errors->get('student_course') as $error)
        <div class="alert alert-danger">
            <p>{{ 'Kailangan to kulit ah' }}</p>
        </div>
      @endforeach
    @endif
    <div class="form-group">
      {!! Form::label('student_school', 'School', array ( 'class' => 'control-label col-sm-2' ) ); !!}
      <div class="col-sm-10">
        {!! Form::text('student_school', '', array ( 'class' => 'form-control'  ) ); !!}
      </div>
    </div>
    @if($errors->any())
      @foreach($errors->get('student_school') as $error)
        <div class="alert alert-danger">
          <p>{{ 'Kailangan to kulit ah' }}</p>
        </div>
      @endforeach
    @endif
    <div class="form-group">
      {!! Form::label('student_picture', 'Picture', array ( 'class' => 'control-label col-sm-2' ) ); !!}
      <div class="control-group">
        <div class="col-sm-10">
          {!! Form::file('student_image') !!}
        </div>
      </div>
    </div>
  @if($errors->any())
  @foreach($errors->get('student_school') as $error)
  <div class="alert alert-danger">
    <p>{{ 'Kailangan to kulit ah' }}</p>
  </div>
  @endforeach
  @endif

        
    
    
  {!! Form::submit('Submit', array( 'class' => 'btn btn-success' )); !!}
 
</div>






{!! Form::close() !!}

@endsection