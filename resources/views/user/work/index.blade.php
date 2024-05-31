{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <h1>Ini Index Scholarship</h1>
    <a href="{{ route('user.dashboard') }}">Back to dashboard</a>
    <table>
        <thead>
            <th>Id</th>
            <th>Image</th>
            <th>Job Name</th>
            <th>Company</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($works as $work)
            <tr>
                <td>{{$work->id}}</td>
                <td> <img src="{{ asset('/storage/work-images/' . $work->image) }}" alt="" style="width: 50px;"></td>
                <td>{{$work->job_name}}</td>
                <td>{{$work->company}}</td>
                <td>{{$work->description}}</td>
                <td>{{$work->salary}}</td>
                <td>
                    <a href="{{$work->information}}" target="_blank">See Info</a>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $work->email }}" target="_blank">Email</a>
                    <a href="https://wa.me/{{$work->contact}}" target="_blank">Contact</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jobs | Portal Prestasi</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logofix.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/colors.css') }}" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>

  <!-- NAVBAR -->
  <nav class="flex justify-center h-[70px]">
    <div class="w-[1240px] flex items-center justify-between">
      <div class="flex items-center w-[577px]">
        <img src="{{ asset('assets/images/logofix.png') }}" alt="" width="45" />
        <a href="{{ route('user.dashboard') }}" class="ml-5 font-bold">PORTAL PRESTASI</a>
      </div>
      <div class="w-[600px] flex justify-between">
            <a href="{{ route('user.competition.index') }}" class="py-[7px]">Competitions</a>
            <a href="{{ route('user.scholarship.index') }}" class="py-[7px] ">Scholarship</a>
            <a href="{{ route('user.work.index') }}" class="py-[7px] nav-active underline">Jobs</a>
            <a href="{{ route('user.activity.index') }}" class="py-[7px]">Activity</a>
            <a href="{{ route('logout') }}" class="btn-primary px-[24px] py-[7px] rounded-2xl">
                <p class="text-white">Log Out</p>
            </a>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section id="comp-hero" class="flex items-center justify-center w-full">
    <div class="container flex flex-col items-center text-center justify-center py-16 px-24" data-aos="fade-down">
      <h1 class="font-semibold text-5xl">Job Vacancies</h1>
      <p class="mt-3 text-lg">Discover, Apply, and Excel in Your Career with Our Latest Job Vacancies</p>
      <div class="w-[1000px] min-h-[2px] bg-black mt-3"></div>
    </div>
  </section>

  <!-- JOB-LIST -->
  <section id="comp-list" class="flex items-center justify-center w-full">
    <div class="container px-24 flex flex-col items-center text-center justify-center">
        @foreach ($works as $work)
        {{-- cardview --}}
        <div class="cardview-3 rounded-2xl mb-14" data-aos="fade-left">
            <h3 class="font-semibold text-2xl mb-4 pl-8 pt-8 pb-4">{{ $work->job_name }}</h3>
            <div class="flex mb-14">
                <div class="flex justify-center pl-14">
                    <a href="job-details.html" class="flex items-center justify-end">
                        <img src="{{ asset('/storage/work-images/' . $work->image) }}" alt="" class="object-cover w-[150px] h-[150px] img-list-hover" style="box-sizing: border-box;">
                    </a>
                </div>
                <div class="flex-1 px-14 text-left flex flex-col justify-between">
                    <div>
                        <p class="text-md font-medium">{{ $work->company }}</p>
                        <p class="text-md mt-2">{{ $work->description }}</p>
                        <p class="text-md">Salary : Rp. {{ $work->salary }}</p>
                    </div>
                    <div class="flex mt-6 space-x-2">
                        <a href="https://wa.me/{{ $work->contact }}" class="btn-secondary bg-transparent border border-gray-400 px-[10px] py-[7px] rounded-2xl" target="_blank">Contact</a>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $work->email }}" class="btn-secondary bg-transparent border border-gray-400 px-[10px] py-[7px] rounded-2xl" target="_blank">Email</a>
                        <a href="{{$work->information}}" class="btn-primary px-[10px] py-[7px] rounded-2xl text-white" target="_blank">More Information</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  </section>

  <div class="pagination flex flex-col items-center mt-4">
    {{ $works->links() }}
  </div>

  <!-- ABOUT -->
  <footer class="footer-color text-white py-8 min-h-44 mt-24">
  <div class="container mx-auto">
    <div class="flex flex-col lg:flex-row items-center justify-between">
      <div class="mb-4 lg:mb-0 px-10">
        <h3 class="text-xl font-semibold mb-4">PORTAL PRESTASI</h3>
        <div class="flex flex-row justify-center">
            <a href="http://wa.me/6281311208474"><img src="{{asset('assets/images/whatsapp.png')}}" class="w-7"></a>
            <div class="w-0.5 h-7 bg-gray-200 mx-2"></div>
            <a href="http://instagram.com"><img src="{{asset('assets/images/instagram.png')}}" class="w-7"></a>
            <div class="w-0.5 h-7 bg-gray-200 mx-2"></div>
            <a href="http://gmail.com"><img src="{{asset('assets/images/gmail.png')}}" class="w-7"></a>
        </div>

      </div>
      <div class="mr-24">
        <h3 class="text-xl font-semibold">Anggota Kelompok</h3>
        <p class="mt-2">Mutiara Anjeli Adrin / I0322089</p>
        <p>Raisa Azzahra / I0322103</p>
        <p>Muhammad Daffa'ul Haqqi Murti / I0322083</p>
        <p>Rizky Ibnu Indrastata / I0322111</p>
        <p>Luqman Al Hakim / I0322069</p>
        <p>⁠Nurrafi Narendraji / I0322096</p>
      </div>
</footer>

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
