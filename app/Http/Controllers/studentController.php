<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Search;
use App\FilterAsc;
use App\student;
use View;
use Validator;
use Input;
use Session;
use App\Paginate;
use Redirect;
use DB;
use Excel;





class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {
      // create var crud to
    $crud = student::orderBy('student_fname', 'ASC')->get();
    return view('crud.index', compact('crud'));
    
    


 
 

    }
  
  public function searchdata() 
  {

    $crud = student::orderBy('student_fname', 'ASC');

    $student_fname = Input::get('searchinput');
    if (!empty($student_fname)) {
      $crud->where('student_fname', 'LIKE', '%'.$student_fname.'%');
      $crud = $crud->get();
      $data = array(
        'result' => $crud,
        'success' => 1
      );
      echo json_encode($data);
    } else {
      $crud = $crud->get();
      $data = array(
        'result' => $crud,
        'success' => 1
      );
      echo json_encode($data);
    }
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // return view crud/create

      return view('crud.create');
    }
  
  
  
  
    public function generateexcel()
    {
      $users = student::select('student_id', 'student_fname', 'student_mname', 'student_lname')->get();
      $file_name = Input::get('excel_report');
      Excel::create($file_name, function($excel) use($users) {
        
        $excel->sheet('Sheet 1', function($sheet) use($users) {
          $sheet->fromArray($users);
        
        });
      })->download('xls');
    }
  
  
  
  public function importexcel() {
    $rules = array(
      'file' => 'required'
    );

    $validator = Validator::make(Input::all(), $rules);
    // process the form
    if ($validator->fails()) 
    {
      return Redirect::to('crud')->withErrors($validator);
      Session::flash('error', 'There\'s an error');
      return redirect(route('crud.index'));
    }
    else
    {
      try {
        Excel::load(Input::file('import_excel'), function ($reader) {

          foreach ($reader->toArray() as $row) {
            student::firstOrCreate($row);
          }
        });
        Session::flash('success', 'Users uploaded successfully.');
        return redirect(route('crud.index'));
      } catch (\Exception $e) {
        Session::flash('error', $e->getMessage());
        return redirect(route('crud.index'));
      }
    }
  }
  
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
      

      $file = array('student_image' => Input::file('student_image'));
      // setting up rules
      $rules = array('student_image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
      // doing the validation, passing post data, rules and the messages
      $validator = Validator::make($file, $rules);
      if ($validator->fails()) {
        // send back to the page with the input data and errors
        return Redirect::to('crud/create')->withInput()->withErrors($validator);
      }
      else {
        // checking file is valid.
        if (Input::file('student_image')->isValid()) {
          $destinationPath = 'uploads'; // upload path
          $extension = Input::file('student_image')->getClientOriginalExtension(); // getting image extension
          $fileName = rand(11111,99999).'.'.$extension; // renameing image
          Input::file('student_image')->move($destinationPath, $fileName); // uploading file to given path
          // sending back with message
          $imgsrc = $destinationPath.'/'.$fileName;
                  DB::table('tbl_students')->insert(array ('student_image' => $imgsrc,
                                                           'student_fname' => Input::get('student_fname'),
                                                           'student_mname' => Input::get('student_mname'),
                                                           'student_lname' => Input::get('student_lname'),
                                                           'student_gender' => Input::get('student_gender'),
                                                           'student_address' => Input::get('student_address'),
                                                           'student_course' => Input::get('student_course'),
                                                           'student_school' => Input::get('student_school')
                                                          ));
          
          $data = array(
            'success' => 1
          );

          json_encode($data);

          //        $crud['student_image'] = $imgsrc;
          //        DB::table('tbl_students')->insert($crud);
          //        Session::flash('flash_message', 'UY! nakapasok ang mga detalye');
          //        return Redirect::to('crud/create');
     Session::flash('flash_message', 'Boom Pasok');
        }
        else {
          // sending back with error message.
          Session::flash('error', 'uploaded file is not valid');
          return Redirect::to('crud/create');
        }
      }
      return View::make('crud.create', compact('crud'));
  
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function show($id)
  {
    return view('crud.edit');
  }
  public function edit($id)
  {
    $crud = student::findOrFail($id);
    return view('crud.edit')->withCrud($crud);
  }
  public function update(Request $request, $id)
  {
    $crud = student::findOrFail($id);
    $this->validate($request, [
      'student_fname' => 'required',
      'student_mname' => 'required',
      'student_lname' => 'required',
      'student_gender' => 'required',
      'student_address' => 'required',
      'student_course' => 'required',
      'student_school' => 'required'
    ]);
    $input = $request->all();
    $crud->fill($input)->save();
    Session::flash('flash_message', 'Student Record Update');
    return redirect()->back();
  }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $crud = student::findOrFail($id);
          $crud->delete();
          Session::flash('flash_messagedel', 'Student Delete!');
          return redirect()->route('crud.index');
    }

}