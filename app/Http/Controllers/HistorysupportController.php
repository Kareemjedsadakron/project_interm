<?php

namespace App\Http\Controllers;
use App\Support;
use Illuminate\Http\Request;

class HistorysupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('q');
        $perPage = 10;
      
        if (!empty($keyword)) {
            $support = Support::where('delete','delete')->where('request', 'LIKE', "%$keyword%")
            ->orWhere('support_number', 'LIKE', "%$keyword%")
            ->orWhere('company', 'LIKE', "%$keyword%")
            ->orWhere('name_customer', 'LIKE', "%$keyword%")
            ->orWhere('responsible', 'LIKE', "%$keyword%")
            ->orderBy('id', 'DESC')->paginate($perPage);
        } else {
            $support = Support::where('delete','delete')->
            orderBy('id', 'DESC')->paginate($perPage);
        }
        return view('historysupport.index',compact('support'));


        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
