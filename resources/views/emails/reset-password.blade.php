<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: auto;
        }

        .email-image {
            border: 2px solid #0FBA68;
            border-radius: 16px;
            width: 520px;
            height: 365px;
            display: block;
            margin: auto;
        }

        .title {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 900;
            font-size: 25px;
            line-height: 30px;
            text-align: center;
            color: #010414;
        }

        .message {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
            text-align: center;
            color: #010414;
        }

        .verify-button {
            display: block;
            width: 392px;
            height: 56px;
            background: #0FBA68;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            line-height: 56px;
            font-weight: bold;
            text-decoration: none;
            color: #FFFFFF;
            margin: auto;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <img src="{{ asset('storage/photos/email-image.png') }}" class="email-image" />

        <h1 class="title">{{ __('messages.recover-password') }}</h1>

        <p class="message">{{ __('messages.recover-password-click') }}</p>

        <a href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}" class="verify-button">
            {{ __('messages.recover-password-button') }}
        </a>

    </div>
</body>
</html>