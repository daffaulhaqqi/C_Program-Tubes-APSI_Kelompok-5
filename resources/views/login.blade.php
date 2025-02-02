{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login Form</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email"  placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" autocomplete="new-password"  placeholder="Enter password" required>

        <input type="submit" class="button" value="Sign in">
    </form>

    @if ($errors->any())
    <script>
        var errorMessage = @json($errors->all());
        alert(errorMessage.join('\n'));
    </script>
    @endif
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In | Portal Prestasi</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logofix.png') }}"/>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/colors.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  </head>
  <body id="register" class="flex items-center justify-center text-center min-h-screen">
    <div class="container mx-auto">
      <div class="flex justify-center">
        <div class="log-box flex flex-col items-center" data-aos="fade-down">
          <h1 class="font-bold text-6xl mt-10">Sign In</h1>

          <!-- FORM -->
          <form action="{{ route('login') }}" method="POST" class="flex-col text-left align-left justify-left">
            @csrf
            <div class="form-group mt-14">
              <p>Email</p>
              <input type="email" id="email" name="email" class="border border-black w-72 rounded-md px-2" required/>
            </div>
            <div class="form-group mt-5">
              <p>Password</p>
              <input type="password" id="password" name="password" class="border border-black w-72 rounded-md px-2" required/>
            </div>
            <div class="form-group mt-5">
              <p>
                Don't have an account?
                <a href="/register" class="text-blue-600 underline">Sign up</a>
              </p>
            </div>
            <div class="text-center form-group mt-10">
              <button type="submit" class="bg-[#3e975a] px-5 py-1 rounded-lg text-white hover:bg-[#45a864]">
                Sign In
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="scripts/script.js"></script>
    <script>
      AOS.init();
    </script>
    @if ($errors->any())
    <script>
        var errorMessage = @json($errors->all());
        alert(errorMessage.join('\n'));
    </script>
    @endif
  </body>
</html>

