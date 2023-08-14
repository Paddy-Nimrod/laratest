<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @auth
        <div>
            <h3>This is premium content for you.</h3>
        </div>
        <div>
            <form method="POST" action="/logout">
                @csrf
                <button>logout</button>
            </form>
        </div>
    @else
        <div style="border:2px solid green; border-radius:3px;">
            <h2>Register here!</h2>

            <form method="POST" action="/register">
                @csrf
                <input class="form-input" type="text" placeholder="name" name='name' required />
                <input class="form-input" type="email" placeholder="email address" name="email" required />
                <input class="form-input" type="password" placeholder="password" name="password" required />
                <button>Register</button>
            </form>
        </div>
        <div style="border:2px solid green; border-radius:3px;">
            <h2>login here!</h2>

            <form method="POST" action="/login">
                @csrf
                <input class="form-input" name="login_name" placeholder="email address" type="email" required />
                <input class="form-input" name="login_password" placeholder="password" type="password" required />
                <button>login</button>
            </form>
        </div>
    @endauth


</body>

</html>
