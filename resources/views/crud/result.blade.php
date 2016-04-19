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
            <tbody class="records posts">
                     @if($count = 0) @endif
                      @foreach($crud as $value)
                      @if($count++) @endif
                      <tr>
                        <td><img class="imgG" src="{{ $value->student_image }}"  alt=""></td>
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
            </tbody>
    </table>
  <div class="alert">Result Found {{ $crud->total() }}</div>
  @if ($crud->lastPage() > 1)
  <ul class="pagination">

    @for ($i = 1; $i <= $crud->lastPage(); $i++)
    <li>
      <a href="{{ $crud->url($i) }}">{{ $i }}</a>
    </li>
    @endfor

    </ul>
    @endif
  </div>
            
            


     