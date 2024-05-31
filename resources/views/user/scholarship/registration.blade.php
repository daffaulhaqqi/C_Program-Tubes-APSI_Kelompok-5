{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <h1>Registration Scholarship #1</h1>
    <form action="{{ route('user.scholarship.store', $scholarships->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <h3>{{ $scholarships->name }}</h3>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ $users->email }}" placeholder="Enter Scholarship Rules" readonly required>

        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname"  placeholder="Enter Full Name" required>

        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik" placeholder="Enter NIK" required>

        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" placeholder="Enter NIM" required>

        <label for="instance">Instance</label>
        <input type="text" name="instance" id="instance" placeholder="Enter Instance" required>

        <label for="department">Department</label>
        <input type="text" name="department" id="department" placeholder="Enter Department" required>

        <input type="submit" class="button" value="Submit">
    </form>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Enroll | Portal Prestasi</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logofix.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/colors.css') }}" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body id="register" class="flex items-left text-left min-h-screen">
  <div class="container mx-auto">
    <h1 class="form-underline font-bold text-6xl mt-10 text-center" data-aos="fade-down">#{{ $scholarships->id }} | {{ $scholarships->name }}</h1>
    <div class="flex flex-row justify-center text-center items-center my-14 mx-[450px]">
        <img src="{{ asset('storage/scholarship-images/'. $scholarships->image) }}" class="w-[345px] h-[510px] object-cover border border-[#d24d49] rounded-2xl" data-aos="fade-down">
        <div class="flex-col w-full ml-16 bg-[#fafafa] px-10 py-6 rounded-2xl border border-[#d24d49]" data-aos="fade-down">
            <form action="{{ route('user.scholarship.store', $scholarships->id) }}" enctype="multipart/form-data" method="POST" class="flex-col text-left align-left justify-left">
            @csrf
            <div class="text-center">
              <p class="font-semibold text-2xl">Enrollment</p>
            </div>
            <div class="form-group mt-5">
                <p>Email</p>
                <input type="email" name="email" id="email" value="{{ $users->email }}" readonly class="border border-black w-72 rounded-md px-2" required>
            </div>
            <div class="form-group mt-2">
                <p>Full Name</p>
                <input type="text" id="fullname" name="fullname" class="border border-black w-72 rounded-md px-2" required>
            </div>
            <div class="form-group mt-2">
                <p>NIM</p>
                <input type="text" id="nim" name="nim" class="border border-black w-72 rounded-md px-2" required>
            </div>
            <div class="form-group mt-2">
                <p>NIK</p>
                <input type="text" id="nik" name="nik" class="border border-black w-72 rounded-md px-2" required>
            </div>
            <div class="form-group mt-2">
                <p>Instance</p>
                <input type="text" id="instance" name="instance" class="border border-black w-72 rounded-md px-2" required>
            </div>
            <div class="form-group mt-2">
                <p>Department</p>
                <input type="text" id="department" name="department" class="border border-black w-72 rounded-md px-2" required>
            </div>
            <div class="text-center">
              <button type="submit" class="bg-[#3e975a] px-5 py-1 rounded-lg text-white hover:bg-[#45a864] mt-10 px-2">Enroll</button>
            </div>
            </form>
        </div>

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
