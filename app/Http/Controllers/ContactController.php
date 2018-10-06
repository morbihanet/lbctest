<?php

namespace LBC\Http\Controllers;

use Illuminate\Http\Request;
use LBC\Contact;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();

        $contacts = $user->contacts()->orderBy('created_at', 'DESC')->get();

        return view('index', compact('user', 'contacts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $fields = $request->only(['user_id', 'firstname', 'lastname', 'email']);

        Contact::create($fields);

        $request->session()->flash('message_flash', 'Contact created!');
        $request->session()->flash('class_flash', 'alert-success');

        return redirect()->route('index');
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Contact $contact)
    {
        return view('edit', compact('contact'));
    }

    /**
     * @param Contact $contact
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Contact $contact, Request $request)
    {
        $fields = $request->only(['user_id', 'firstname', 'lastname', 'email']);

        $contact->update($fields);

        $request->session()->flash('message_flash', 'Contact updated!');
        $request->session()->flash('class_flash', 'alert-success');

        return redirect()->route('index');
    }
}
