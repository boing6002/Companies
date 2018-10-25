<?php

namespace LaravelEnso\Companies\app\Forms\Builders;

use LaravelEnso\Companies\app\Models\Company;
use LaravelEnso\Companies\app\Models\Contact;
use LaravelEnso\FormBuilder\app\Classes\Form;

class ContactForm
{
    private const TemplatePath = __DIR__.'/../Templates/contact.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form($this->templatePath());
    }

    public function create(Company $company)
    {
        return $this->form
            ->append('company_id', $company->id)
            ->create();
    }

    public function edit(Contact $contact)
    {
        return $this->form
            ->edit($contact);
    }

    private function templatePath()
    {
        return self::TemplatePath;
    }
}
