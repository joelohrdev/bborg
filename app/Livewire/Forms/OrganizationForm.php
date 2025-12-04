<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use Livewire\Form;

final class OrganizationForm extends Form
{
    public string $name = '';

    public string $address = '';

    public string $city = '';

    public string $state = '';

    public string $zip = '';

    public string $logo = '';
}
