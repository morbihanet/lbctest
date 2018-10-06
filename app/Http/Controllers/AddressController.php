<?php

namespace LBC\Http\Controllers;

use Illuminate\Http\Request;
use LBC\Address;
use LBC\Contact;

class AddressController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Contact $contact)
    {
        return view('address.index', compact('contact'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Contact $contact)
    {
        return view('address.create', compact('contact'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Contact $contact, Request $request)
    {
        $fields = $request->only(['street', 'zip', 'city', 'country']);
        $fields['contact_id'] = $contact->id;

        Address::create($fields);

        $request->session()->flash('message_flash', 'Address created!');
        $request->session()->flash('class_flash', 'alert-success');

        return redirect()->route('address.index', ['contact' => $contact]);
    }

    /**
     * @param Address $address
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Address $address)
    {
        return view('address.edit', compact('address'));
    }

    /**
     * @param Contact $contact
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Address $address, Request $request)
    {
        $fields = $request->only(['street', 'zip', 'city', 'country']);

        $address->update($fields);

        $request->session()->flash('message_flash', 'Address updated!');
        $request->session()->flash('class_flash', 'alert-success');

        return redirect()->route('address.index', ['contact' => $address->contactRaw()->id]);
    }
}
