 
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
     