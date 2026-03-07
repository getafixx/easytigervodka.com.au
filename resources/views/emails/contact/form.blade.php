<x-mail::message>
# New Contact Form Submission

You have received a new message from your website contact form.

**Name:** {{ $data['name'] }}

**Email:** <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>

**Message:**
> {{ $data['message'] }}
</x-mail::message>