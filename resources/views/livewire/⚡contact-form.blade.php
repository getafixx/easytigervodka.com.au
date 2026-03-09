<?php

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Rule;
use Livewire\Component;

new class extends Component {
    #[Rule('required|min:2')]
    public string $name = '';

    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required|min:10')]
    public string $message = '';

    public bool $sent = false;

    public function submit(): void
    {
        $this->validate();

        Mail::to('hello@easytigervodka.com.au')->send(new ContactFormMail([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]));

        $this->reset(['name', 'email', 'message']);
        $this->sent = true;
    }
};
?>

<div>
    @if($sent)
        <div class="alert-success">
            Thanks! Your message has been sent.
        </div>
    @endif

    <form wire:submit="submit" class="contact-form">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" wire:model="name" required>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" wire:model="email" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" wire:model="message" rows="5" required></textarea>
            @error('message') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn-primary">
            <span wire:loading.remove>Send Message</span>
            <span wire:loading>Sending...</span>
        </button>

    </form>
</div>