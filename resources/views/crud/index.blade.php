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
  @if(Session::has('success'))
  <div class="alert alert-danger" style="margin-top: 20px;">
    {{ Session::get('success') }}
  </div>
  
  @endif
  @if(Session::has('error'))
  <div class="alert alert-danger" style="margin-top: 20px;">
    {{ Session::get('error') }}
  </div>
  @endif
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {!! Form::text('student_fname', '', array ( 'class' => 'form-control searchinput'  ) ); !!}


   <div class="ResTable">
     @include('crud.result')
   </div>
                   
       

 
    


<div class="col-md-6">
   <h1>Generate Excel</h1>
    {!! Form::open(['url' => 'excel', 'method' => 'post']) !!}
    
      {!! Form::text('excel_report', '', array('class' => 'form-control') ) !!}
   
    {!!  Form::submit('Generate EXCEL REPORT', array( 'class' => 'btn btn-primary' ));  !!}
    {!! Form::close() !!}
</div>
<div class="col-md-6">
   <h1>Import Excel</h1><br>
    {!! Form::open(['url' => 'getexcel', 'method' => 'post']) !!}
   
      {!! Form::file('import_excel', '', array('class' => 'form-control') ) !!}
   
    {!!  Form::submit('Upload EXCEL REPORT', array( 'class' => 'btn btn-success' ));  !!}
    {!! Form::close() !!}
</div>
    
    
    
  </div>
</div>


@endsection