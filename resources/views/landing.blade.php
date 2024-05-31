<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal Prestasi</title>
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
        <a href="/" class="ml-5 font-bold">PORTAL PRESTASI</a>
      </div>
      <div class="w-[279px] flex justify-between">
        <a href="/register"
          class="btn-secondary bg-transparent border border-gray-400 px-[24px] py-[7px] rounded-2xl ml-14">
          Sign up
        </a>
        <a href="/login" class="btn-primary border border-gray-500 px-[24px] py-[7px] rounded-2xl">
          <p class="text-white">Sign in</p>
        </a>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section id="hero" class="flex items-center justify-center text-center min-h-screen">
    <div class="container mx-auto">
      <div class="flex justify-center">
        <div class="landing-box flex flex-col justify-center items-center" data-aos="fade-up">
          <h1 class="font-bold text-6xl">PORTAL PRESTASI</h1>
          <h5 class="mt-3 mb-5 text-lg w-3/5">Welcome to Portal Prestasi, your go-to source for the latest competitions,
            job vacancies, and scholarships. Discover opportunities and stay updated effortlessly.</h5>
          <a href="/register" class="btn-primary px-6 py-2 rounded-full text-white mt-10">Get Started</a>
        </div>
      </div>
    </div>
  </section>

  <!-- EVENTS -->
  <section id="events" class="flex flex-col items-center justify-center min-h-screen">
    <div class="mt-20" data-aos="fade-up">
      <h1 class="font-semibold text-5xl text-center">Events</h1>
      <div class="w-[1000px] min-h-[2px] bg-black mt-3"></div>
    </div>

    <div class="cardview flex-col justify-between mt-24 px-24 rounded-xl" data-aos="fade-left">
      <div class="w-full mt-10">
        <img src="assets/images/competition-img.jpg" alt="Your Image" class="w-56 float-left mr-24 rounded-xl w-72" />
      </div>
      <div class="flex-col w-full mx-5 justify-between">
        <h2 class="font-semibold text-2xl">Competitions</h2>
        <p class="mt-4">Discover a wide range of exciting competitions designed to challenge your skills and showcase
          your talents. Join now to compete with the best, gain recognition, and take your achievements to the next
          level.</p>
      </div>
      <div class="info-1 w-full text-end mt-28">
        <a href="/register" class="btn-primary px-6 py-2 rounded-full text-white">
          More Info
        </a>
      </div>
    </div>

    <div class="cardview flex-col justify-between mt-14 px-24 rounded-xl" data-aos="fade-right">
      <div class="w-full mt-10">
        <img src="assets/images/job.jpg" alt="Your Image" class="w-56 float-right ml-24 rounded-xl w-72" />
      </div>
      <div class="flex-col mx-5 justify-between text-right">
        <h2 class="font-semibold text-2xl">Job Vacancies</h2>
        <p class="mt-4">Explore a diverse array of job vacancies tailored to various industries and expertise levels.
          Find your next career opportunity, connect with top employers, and take the next step towards achieving your
          professional goals.</p>
      </div>
      <div class="info-1 w-full mt-28">
        <a href="/register" class="btn-primary px-6 py-2 rounded-full text-white">
          More Info
        </a>
      </div>
    </div>

    <div class="cardview flex-col justify-between mt-14 px-24 rounded-xl" data-aos="fade-left">
      <div class="w-full mt-10">
        <img src="assets/images/scholarship.jpg" alt="Your Image" class="w-56 float-left mr-24 rounded-xl w-72" />
      </div>
      <div class="flex-col w-full mx-5 justify-between">
        <h2 class="font-semibold text-2xl">Scholarship</h2>
        <p class="mt-4">Unlock a world of educational opportunities with our comprehensive list of scholarships. Secure
          financial support for your studies, pursue your academic dreams, and invest in a brighter future.</p>
      </div>
      <div class="info-1 w-full text-end mt-28">
        <a href="/register" class="btn-primary px-6 py-2 rounded-full text-white">
          More Info
        </a>
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section id="features" class="mt-40" data-aos="fade-up">
    <div class="flex flex-col text-center items-center bg-[#e6ecf5] px-10 py-8">
      <div>
        <p class="font-medium text-lg">Unlock Opportunities, Redefined.</p>
        <p class="w-[600px]">That means seamless, accessible, and adaptable—whether you're seeking a chance to excel in
          competitions,
          advance your career through job openings, or pursue education with scholarships.</p>
      </div>
      <div class="flex flex-row gap-40 mt-12">
        <div class="flex flex-col">
          <img src="{{ asset('assets/images/opportunity.png')}}" class="w-[100px]">
          <p>Exclusive <br> Opportunities</p>
        </div>
        <div class="flex flex-col">
          <img src="{{ asset('assets/images/listing.png')}}" class="w-[100px]">
          <p>Curated <br> Listings</p>
        </div>
        <div class="flex flex-col">
          <img src="{{asset('assets/images/time.png')}}" class="w-[100px]">
          <p>Real-time <br> Updates</p>
        </div>
        <div class="flex flex-col">
          <img src="{{asset('assets/images/user-friendly')}}.png" class="w-[100px]">
          <p>User-friendly <br> Interface</p>
        </div>
        <div class="flex flex-col">
          <img src="{{asset('assets/images/trust.png')}}" class="w-[100px]">
          <p>Trusted <br> Source</p>
        </div>
      </div>
      <div class="flex flex-row my-24">
        <img src="{{asset('assets/images/arrow.png')}}" class="w-[70px] h-[70px] -my-3 mx-20">
        <a href="/login" class="font-semibold text-5xl hover-underline">Don't Miss Out!</a>
        <img src="{{asset('assets/images/arrow.png')}}" class="w-[70px] h-[70px] -my-3 scale-x-[-1] mx-20">
      </div>
    </div>
  </section>

  <footer class="footer-color text-white py-8 min-h-44">
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
