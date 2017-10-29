<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use Illuminate\Support\Collection as Collection;
use Illuminate\Pagination\LengthAwarePaginator;
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

//Paginate collection function
  public function paginate($items, $perPage = 15, $page = null, $options = [])
  {
  	$page = $page ?: (LengthAwarePaginator::resolveCurrentPage() ?: 1);
  	$items = $items instanceof Collection ? $items : Collection::make($items);
  	return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
    if(($request->get('memberAll')== 'false')&&($request->get('memberStudents')== 'false')&&($request->get('memberAlumni')== 'false')&&($request->get('memberFaculties')== 'false') )
    {
      $member = User::with('course')->get();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }
    if ($request->get('memberAll') == 'true') {
      $member = User::with('course')->where('activated','>', 0)->get();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }

    if ($request->get('memberStudents') == 'true') {
      $member = User::with('course')->where('activated', '=', 1)->get();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }

    if ($request->get('memberAlumni') == 'true') {
      $member = User::with('course')->where('activated', '=', 2)->get();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }

    if ($request->get('memberFaculties') == 'true') {
      $member = User::with('course')->where('activated', '=', 3)->get();
      foreach ($member as $key => $value) {
        $result1->push($value);
      }
    }

    //If everything is unselected, then default behaviour is ALl types
    if(($request->get('campusAll')== 'false')&&($request->get('campusAmritapuri')== 'false')&&($request->get('campusEttimadai')== 'false')&&($request->get('campusBangalore')== 'false')&&($request->get('campusKochi')== 'false') ) {
      $campus = User::with('course')->get();
      foreach ($member as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusAll') == 'true') {
      $campus = User::with('course')->where('campus_id', '>', 0)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusAmritapuri') == 'true') {
      $campus = User::with('course')->where('campus_id', '=', 1)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusEttimadai') == 'true') {
      $campus = User::with('course')->where('campus_id', '=', 2)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusKochi') == 'true') {
      $campus = User::with('course')->where('campus_id', '=', 3)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    if ($request->get('campusBangalore') == 'true') {
      $campus = User::with('course')->where('campus_id', '=', 4)->get();
      foreach ($campus as $key => $value) {
        $result2->push($value);
      }
    }

    //If everything is unselected, then default behaviour is ALl types
    if(($request->get('courseAll')== 'false')&&($request->get('bca')== 'false')&&($request->get('mca')== 'false')&&($request->get('mech')== 'false')&&($request->get('eee')== 'false') ) {
      $course = User::with('course')->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }
    if ($request->get('courseAll') == 'true') {
      $course = User::with('course')->where('course_id', '>', 0)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    if ($request->get('bca') == 'true') {
      $course = User::with('course')->where('course_id', '=', 1)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    if ($request->get('mca') == 'true') {
      $course = User::with('course')->where('course_id', '=', 2)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    if ($request->get('mech') == 'true') {
      $course = User::with('course')->where('course_id', '=', 3)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    if ($request->get('eee') == 'true') {
      $course = User::with('course')->where('course_id', '=', 4)->get();
      foreach ($course as $key => $value) {
        $result3->push($value);
      }
    }

    //combine results
    $results = $result1->intersect($result2)->intersect($result3);
    //$results = $results->intersect($result3);

    if(!$request->jyear&&!$request->jyear) {
      $jyear = User::with('course')->get();
      $gyear = User::with('course')->get();
    }

    if($request->jyear) {
      $jyear = User::with('course')->where('joining_year', '=', $request->jyear)->get();
      $gyear = User::with('course')->get();
    }

    if($request->gyear) {
      if(!$request->jyear)
        $jyear = User::with('course')->get();

      $gyear = User::with('course')->where('graduation_year', '=', $request->gyear)->get();
    }

    //combine yet again
    $results = $results->intersect($jyear)->intersect($gyear);

    //Text based search
    if($name = $request->input('search')) {

      $array = explode(" ", $name);
      $search = '%';

      foreach ($array as $value) {
        $search = $search.$value.'%';
      }
      //dd($search);

      $users = User::with('course')->where([
        ['name', 'LIKE', $search],
        ['activated', '!=', 0],
      ])->get();

      $results = $results->intersect($users);
    }

    $results = $results->where('activated', '!=', 0);
    $results = $results->unique();
    $results = $this->paginate($results, 20);

    return $results;

  }
}
