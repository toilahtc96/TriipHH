<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = ContactInfo::sortable(['created_at', 'desc'])->paginate(10);
        return view('admin/contact/list-contact')->with('contacts', $contacts)
            ->with('table_name', 'contact_infos')->with('url_link', 'contacts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return redirect("/admin");
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
        $contact = ContactInfo::where('id', $id)->firstOrFail();
        return view('admin/contact/edit-contact')->with("contact", $contact)
            ->with('url_link', 'contacts');
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
            'fullname' => 'required'
        ]);

        $contact = ContactInfo::find($id);
        $contact->fullname = $request->fullname;
        $contact->msisdn = $request->msisdn;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->save();

        $request->session()->flash('status', 'Update Contact Successful!');
        $request->session()->flash('modal_title', 'Successful!');
        $request->session()->flash('modal_content', 'Update Contact Successful!');
        return redirect('/admin/contacts')->with('url_link', 'contacts');
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
