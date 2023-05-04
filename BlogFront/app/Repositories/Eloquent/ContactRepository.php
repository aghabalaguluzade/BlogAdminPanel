<?php

namespace App\Repositories\Eloquent;

use App\Models\ContactMe;
use App\Models\Settings;
use App\Repositories\Contracts\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
     protected $contact;
     protected $settings;

     public function __construct(ContactMe $contact, Settings $settings)
     {
          $this->contact = $contact;
          $this->settings = $settings;
     }

     public function getSettings()
     {
          return $this->settings->first();
     }

     public function create(array $data) {
          return $this->contact->create($data);
     }
}