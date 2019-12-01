<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComboType;

class ComboTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $combotypes = ComboType::sortable()->paginate(5);
        return view('admin/combotype/list-combotype')->with('combotypes', $combotypes)
        ->with('table_name','combotypes')->with('url_link','combotypes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/combotype/new-combotype')->with('url_link','combotypes');
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
        $validatedData = $request->validate([
            'combo_type_name' => 'required|max:255',
            'detail'  => 'required'
        ]);
        // store in the database
        $combotype =  new ComboType();
        $combotype->combo_type_name = $request->combo_type_name;
        $combotype->detail = $request->detail;
        $combotype->status = $request->status == null ? 1 : $request->status;
        $combotype->save();
        // Session::flash('success', 'The hotel post was successfully saved!');
        return redirect()->route('combotypes.view')->with('url_link','combotypes');
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
        $combotype =  Combotype::where('id', $id)->findOrFail($id);
        return view('admin/combotype/edit-combotype')->with('combotype', $combotype)->with('url_link','combotypes');
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
        $validatedData = $request->validate([
            'combo_type_name' => 'required|max:255',
            'detail'  => 'required'
        ]);

        // // process the login
        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator)
        //         ->withInput();
        // }
        $combotype  = Combotype::find($id);
        $combotype->combo_type_name = $request->combo_type_name;
        $combotype->detail = $request->detail;
        $combotype->status = $request->status == null ? 1 : $request->status;

        $combotype->save();

        $request->session()->flash('status', 'Update Combotype ' . $combotype->combo_type_name . ' Successful!');
        $request->session()->flash('modal_title', 'Successful!');
        $request->session()->flash('modal_content', 'Update ComboType Successful!');
        return redirect('/admin/combotypes')->with('url_link','combotypes');
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