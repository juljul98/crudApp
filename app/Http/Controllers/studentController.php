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




class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index(Request $request)
    {
      // create var crud to
    
    $crud = student::orderBy('student_fname', 'ASC');
      $student_fname = $request->input('student_fname');
      if (!empty($student_fname)) {
        $crud->where('student_fname', 'LIKE', '%'.$student_fname.'%' );
      }
    $crud=$crud->paginate(999);
      return View::make('crud.index', compact('crud'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // return view crud/create

      return View::make('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $crud = student::findOrFail($id);
          return view('crud.edit')->withCrud($crud);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function upload() {
    }
}