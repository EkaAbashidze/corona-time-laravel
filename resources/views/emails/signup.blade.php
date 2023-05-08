<x-mail::message>
    <img src="{{ asset('storage/photos/email-image.png') }}" style="border: 2px solid #0FBA68; border-radius: 16px; width: 520px; height: 365px;" />

    <h1 style="font-family: 'Inter'; font-style: normal; font-weight: 900; font-size: 25px; line-height: 30px; text-align: center; color: #010414;">Confirmation Email</h1>

    <p style="font-family: 'Inter'; font-style: normal; font-weight: 400; font-size: 18px; line-height: 22px; text-align: center; color: #010414;">Click the button below to verify your email.</p>

    <x-mail::button :url="route('verification.verify')" style="display: block; width: 392px; height: 56px; background: #0FBA68; border-radius: 8px; text-align: center; font-size: 18px; line-height: 56px; font-weight: bold; text-decoration: none; color: #FFFFFF;">
    Verify Email
    </x-mail::button>


    <p style="text-align: center;">Thanks,<br>
        {{ config('app.name') }}
    </p>
</x-mail::message>
