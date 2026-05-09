<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
        }

        .box {
            width: 380px;
            margin: 60px auto;
            padding: 25px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 6px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #3490dc;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        .link a {
            color: #3490dc;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="box">
    <h2>Register</h2>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <input type="text" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}">
        <textarea name="address" placeholder="Address">{{ old('address') }}</textarea>
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">

        <button type="submit">Register</button>
    </form>

    <div class="link">
        <a href="{{ route('login') }}">Already registered? Login here</a>
    </div>
</div>
</body>
</html>