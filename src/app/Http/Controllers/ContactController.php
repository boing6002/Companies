<?php

namespace LaravelEnso\Companies\app\Http\Controllers;

//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
use LaravelEnso\Companies\app\Models\Company;
use LaravelEnso\Companies\app\Models\Contact;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LaravelEnso\Companies\app\Forms\Builders\ContactForm;
use LaravelEnso\Companies\app\Contracts\ValidatesContactRequest;

class ContactController extends Controller
{
    use AuthorizesRequests;

    public function index(Company $company)
    {
        return $company
            ->contacts()
            ->with('person')
            ->get();
    }

    public function create(Company $company, ContactForm $form)
    {
        return ['form' => $form->create($company)];
    }

    public function store(ValidatesContactRequest $request)
    {
        $contact = Contact::create($request->all());

        return [
            'message' => __('The company was successfully created'),
            'redirect' => 'administration.companies.edit',
            'id' => $contact->id,
        ];
    }

    public function edit(Contact $contact, ContactForm $form)
    {
        return ['form' => $form->edit($contact)];
    }

    public function update(ValidatesContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());

        return ['message' => __('The company was successfully updated')];
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return [
            'message' => __('The contact was successfully deleted'),
        ];
    }
}
