<?php

use Livewire\Component;

use App\Livewire\Forms\OrganizationForm;
use Flux\Flux;

new class extends Component
{
    public OrganizationForm $form;

    public function mount(): void
    {
        if (auth()->user()) {
            Flux::modal('edit-profile')->show();
        }
    }
};
?>

<div>
    <flux:modal name="edit-profile" :dismissible="false" :closable="false" class="md:w-[1200px]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update Organization Details</flux:heading>
            </div>
            <flux:input label="Organization Name" wire:model="form.name" />
            <flux:input label="Address" wire:model="form.address" />
            <div class="grid grid-cols-3 gap-2">
                <flux:input label="City" wire:model="form.city" />
                <flux:input label="State" wire:model="form.state" />
                <flux:input label="Zip Code" wire:model="form.zip" />
            </div>
            <flux:file-upload wire:model="form.logo" label="Upload logo">
                <flux:file-upload.dropzone
                    heading="Drop files here or click to browse"
                    text="JPG, PNG, GIF up to 10MB"
                />
            </flux:file-upload>
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
