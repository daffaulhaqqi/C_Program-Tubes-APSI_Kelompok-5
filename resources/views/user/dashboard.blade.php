{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome User</h1>
    <a href="{{ route('user.competition.index') }}">Competition</a>
    <a href="{{ route('user.scholarship.index') }}">Scholarship</a>
    <a href="{{ route('user.work.index') }}">Job Vacancies</a>
    <a href="{{ route('user.activity.index') }}">Active</a>
    <a href="{{ route('logout') }}">Logout</a>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Portal Prestasi</title>
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
        <a href="{{ route('user.scholarship.index') }}" class="py-[7px]">Scholarship</a>
        <a href="{{ route('user.work.index') }}" class="py-[7px]">Jobs</a>
        <a href="{{ route('user.activity.index') }}" class="py-[7px]">Activity</a>
        <a href="{{ route('logout') }}" class="btn-primary px-[24px] py-[7px] rounded-2xl">
          <p class="text-white">Log Out</p>
        </a>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section id="dashboard-hero" class="flex items-center min-h-screen">
    <div class="container mx-auto">
      <div class="flex">
        <div class="flex flex-col ml-44 mt-14" data-aos="fade-up">
          <h1 class="welcome-text font-bold text-6xl">Welcome</h1>
          <h5 class="mt-12 mb-5 text-lg w-[610px] text-[20px]">Stay organized and updated to seize every opportunity for career and educational advancement. Access the latest information effortlessly and propel yourself towards success.</h5>
          <a href="#dashboard-list" class="btn-primary px-[24px] py-[7px] rounded-2xl w-44 text-center text-white mt-6">View Info</a>
        </div>
      </div>
    </div>
  </section>

  <!-- LIST -->
  <section id="dashboard-list" class="py-[140px] scroll-behavior:smooth flex items-center justify-center w-full">
    <div class="container">

      <!-- COMPETITIONS -->
      <div class=" px-24">
        <h1 class="font-semibold text-4xl underline" data-aos="fade-left">Competitions</h1>
        <div class="mt-14 flex flex-start gap-[3.5rem]">
          @foreach ($competitions as $competition)
          <div class="cardview-2 flex flex-col rounded-2xl" data-aos="fade-up">
            <div class="px-10 py-8">
              <a href="{{ route('user.competition.details', $competition->id) }}" class="image-container"><img src="{{ asset('storage/competition-images/' . $competition->image) }}" class="img-list-hover h-[440px]"></a>
              <p class="font-semibold mt-6">{{ $competition->name }}</p>
              <p class="italic">{{ $competition->organizer }}</p>
            </div>
          </div>
          @endforeach
        </div>
        <div class="mt-10">
          <a href="{{ route('user.competition.index') }}" class="btn-primary px-[24px] py-[7px] rounded-2xl w-[56px] text-center text-white">View All Competitions</a>
        </div>
      </div>

      <!-- SCHOLARSHIP -->
      <div class=" px-24 mt-40">
        <h1 class="font-semibold text-4xl underline" data-aos="fade-left">Scholarship</h1>
        <div class="mt-14 flex flex-start gap-[3.5rem]">
            @foreach ($scholarships as $scholarship)
            <div class="cardview-2 flex flex-col rounded-2xl" data-aos="fade-up">
              <div class="px-10 py-8">
                <a href="{{ route('user.scholarship.details', $scholarship->id) }}" class="image-container"><img src="{{ asset('storage/scholarship-images/' . $scholarship->image) }}" class="img-list-hover h-[440px]"></a>
                <p class="font-semibold mt-6">{{ $scholarship->name }}</p>
                <p class="italic">{{ $scholarship->organizer }}</p>
              </div>
            </div>
            @endforeach
        </div>
        <div class="mt-10">
          <a href="{{ route('user.scholarship.index') }}" class="btn-primary px-[24px] py-[7px] rounded-2xl w-[56px] text-center text-white">View All Scholarship Offers</a>
        </div>
      </div>

      <!-- JOB VACANCIES -->
      <div class=" px-24 mt-40">
        <h1 class="font-semibold text-4xl underline" data-aos="fade-left">Job Vacancies</h1>
        <div class="mt-14 flex flex-start flex-wrap gap-10">
            @foreach ($works as $work)
            <div class="cardview-4 flex flex-row rounded-2xl mb-8" data-aos="fade-up">
              <div class="px-10 py-8 flex items-center">
                <a href="{{$work->information}}" target="_blank"  class="image-container-2"><img src="{{ asset('storage/work-images/' . $work->image) }}" class="img-list-hover h-[120px] w-[120px] mt-3" style="object-fit: cover"></a>
                <div class="ml-10">
                  <p class="font-semibold mt-1">{{ $work->job_name }}</p>
                  <p class="italic">{{ $work->company }}</p>
                </div>
              </div>
            </div>
            @endforeach
        </div>
        <div class="mt-10">
          <a href="{{ route('user.work.index') }}" class="btn-primary px-[24px] py-[7px] rounded-2xl w-[56px] text-center text-white">View All Job Vacancies</a>
        </div>
      </div>
    </div>
  </section>

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

</body>
</html>
