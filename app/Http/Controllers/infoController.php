<?php

namespace App\Http\Controllers;

use App\Info;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Log;
 

class infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('info');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
       


        $this->validate($request, [
              'firstname'=>'required',
              'lastname'=>'required',
              'profile'=>'required' ]
          );

        
 
        $file = Info::create([
            'info_firstname' => request('firstname'),
            'info_lastname' => request('lastname'),
            'info_profile' => request('profile'),
        ]);


        log::info($file);
 
        
 
        return response()->json(['errors' => [], 'index' => Info::all(), 'status' => 200], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        
        return ['index' => Info::all()];

        /*return response()->json([
            'tasks' => Info::all()
        ], 200); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request)
    {
       // Storage::delete(__DIR__ . '/../../../image_uploads/' . $request->input('id'));
 
        //Info::find($request->input('info_id'))->delete();

         DB::table('info')->where('info_id', $request->input('info_id'))->delete();
  
 
        return response()->json(['errors' => [], 'message' => 'File Successfully deleted!', 'status' => 200], 200);
    }
}
