<?php

namespace Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Mitra\User as User;
use Illuminate\Support\Collection as Collection;
class SearchController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth:web');
  }

  public function search(Request $request)
  {
    $results = new Collection;
    $result1 = new Collection;
    $result2 = new Collection;
    $result3 = new Collection;
    $jyear = new Collection;
    $gyear = new Collection;

    //If everything is unselected, then default behaviour is ALl types
    if(($request->get('memberAll')== false)&&($request->get('memberStudents')== false)&&($request->get('memberAlumni')== false)&&($request->get('memberFaculties')== false) )
    {
      $member = User::all();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }
    if ($request->get('memberAll') == 'true') {
      $member = User::where('activated','>', 0)->get();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }

    if ($request->get('memberStudents') == 'true') {
      $member = User::where('activated', '=', 1)->get();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }

    if ($request->get('memberAlumni') == 'true') {
      $member = User::where('activated', '=', 2)->get();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }

    if ($request->get('memberFaculties') == 'true') {
      $member = User::where('activated', '=', 3)->get();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }

    //If everything is unselected, then default behaviour is ALl types
    if(($request->get('campusAll')== false)&&($request->get('campusAmritapuri')== false)&&($request->get('campusEttimadai')== false)&&($request->get('campusBangalore')== false)&&($request->get('campusKochi')== false) ) {
      $campus = User::all();
      foreach ($member as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusAll') == 'true') {
      $campus = User::where('campus_id', '>', 0)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusAmritapuri') == 'true') {
      $campus = User::where('campus_id', '=', 1)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusEttimadai') == 'true') {
      $campus = User::where('campus_id', '=', 2)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusKochi') == 'true') {
      $campus = User::where('campus_id', '=', 3)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusBangalore') == 'true') {
      $campus = User::where('campus_id', '=', 4)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    //If everything is unselected, then default behaviour is ALl types
    if(($request->get('courseAll')== false)&&($request->get('bca')== false)&&($request->get('mca')== false)&&($request->get('mech')== false)&&($request->get('eee')== false) ) {
      $course = User::all();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }
    if ($request->get('courseAll') == 'true') {
      $course = User::where('course_id', '>', 0)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    if ($request->get('bca') == 'true') {
      $course = User::where('course_id', '=', 1)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    if ($request->get('mca') == 'true') {
      $course = User::where('course_id', '=', 2)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    if ($request->get('mech') == 'true') {
      $course = User::where('course_id', '=', 3)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    if ($request->get('eee') == 'true') {
      $course = User::where('course_id', '=', 4)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    //combine results
    $results = $result1->intersect($result2)->intersect($result3);
    //$results = $results->intersect($result3);

    if(!$request->jyear&&!$request->jyear) {
      $jyear = User::all();
      $gyear = User::all();
    }

    if($request->jyear) {
      $jyear = User::where('joining_year', '=', $request->jyear)->get();
      $gyear = User::all();
    }

    if($request->gyear) {
      if(!$request->jyear)
        $jyear = User::all();

      $gyear = User::where('graduation_year', '=', $request->gyear)->get();
    }

    //combine yet again
    $results = $results->intersect($jyear)->intersect($gyear);
//    $results = $results->intersect($gyear);


    return $result3->unique()->toArray();

  }
}
