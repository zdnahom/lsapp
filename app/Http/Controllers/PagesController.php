<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
         $title='This is the First Page';
        return view('pages.index',compact('title'));
        // return view('pages.services')->with('title',$title); //same as the above one
    }
    public function about(){
        return view('pages.about');
    }  
    public function services(){
        $data=array(
            'title'=>'Services',
            'services'=>['Online Booking','Register Users','See Events']
        );
        // return view('pages.services',compact('title'));
        return view('pages.services')->with($data); //same as the above one
    }  
}
