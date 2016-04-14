<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
use Request;



class student extends Model
{
  protected $table = 'tbl_students';
  protected $primaryKey = 'student_id';
  protected $fillable = array (
    'student_image',
    'student_fname',
    'student_mname',
    'student_lname',
    'student_gender',
    'student_address',
    'student_course',
    'student_school'
  );
  public function scopeSearch($query)
  {
  $student_fname = Input::get('student_fname');
    return $query->where('student_fname', 'LIKE', '%'.$student_fname.'%' )->orderBy('student_fname', 'ASC');
  }
//  public function scopeInsertData()
//  {
//    $file = array('student_image' => Input::file('student_image'));
//    // setting up rules
//    $rules = array('student_image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
//    // doing the validation, passing post data, rules and the messages
//    $validator = Validator::make($file, $rules);
//    if ($validator->fails()) {
//      // send back to the page with the input data and errors
//      return Redirect::to('crud/create')->withInput()->withErrors($validator);
//    }
//    else {
//      // checking file is valid.
//      if (Input::file('student_image')->isValid()) {
//        $destinationPath = 'uploads'; // upload path
//        $extension = Input::file('student_image')->getClientOriginalExtension(); // getting image extension
//        $fileName = rand(11111,99999).'.'.$extension; // renameing image
//        Input::file('student_image')->move($destinationPath, $fileName); // uploading file to given path
//        // sending back with message
//        $imgsrc = $destinationPath.'/'.$fileName;
////        DB::table('tbl_students')->insert(array ('student_image' => $imgsrc,
////                                                 'student_fname' => Input::get('student_fname'),
////                                                 'student_mname' => Input::get('student_mname'),
////                                                 'student_lname' => Input::get('student_lname'),
////                                                 'student_gender' => Input::get('student_gender'),
////                                                 'student_address' => Input::get('student_address'),
////                                                 'student_course' => Input::get('student_course'),
////                                                 'student_school' => Input::get('student_school')
////                                                ));
//       
////        $crud['student_image'] = $imgsrc;
////        DB::table('tbl_students')->insert($crud);
////        Session::flash('flash_message', 'UY! nakapasok ang mga detalye');
////        return Redirect::to('crud/create');
//        return dd(Request::all());
//      }
//      else {
//        // sending back with error message.
//        Session::flash('error', 'uploaded file is not valid');
//        return Redirect::to('crud/create');
//      }
//    }
//  }
  
  
}