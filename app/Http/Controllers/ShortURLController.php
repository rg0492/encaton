<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortURLVisit;
use Validator;
class ShortURLController extends Controller
{
  public function index(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'url' => 'required|unique:short_urls,destination_url|max:255',
  ]);

  if ($validator->fails()) {
    return redirect()->back()->with('error', $validator->errors());
}

    $url = $request->url;
    $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
    $shortURLObject = $builder->destinationUrl($url)->trackVisits()->make();
    $shortURL = $shortURLObject->default_short_url;
    $id =$shortURLObject->id;
    
    return redirect()->route('home');
    //return view('short',compact('shortURLObject','shortURL','noVisit'));
  }

  public function view($id)
  {
    $visit = ShortURLVisit::where('short_url_id',$id)->first();
    $noVisit = isset($visit->visits)?$visit->visits:0;
    return view('short',compact('noVisit'));
  }
}
