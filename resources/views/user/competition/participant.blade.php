{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($winners as $winner)
    {{ $winner->competition_participants->fullname }}
    @endforeach
    <br><br>
    @foreach ($competitionParticipants as $cp)
    {{ $cp->fullname }}
    @endforeach
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Scholarship | Portal Prestasi</title>
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
          <a href="{{ route('user.competition.index') }}" class="py-[7px] nav-active underline">Competitions</a>
          <a href="{{ route('user.scholarship.index') }}" class="py-[7px]">Scholarship</a>
          <a href="{{ route('user.work.index') }}" class="py-[7px]">Jobs</a>
          <a href="{{ route('user.activity.index') }}" class="py-[7px]">Activity</a>
          <a href="{{ route('logout') }}" class="btn-primary px-[24px] py-[7px] rounded-2xl">
            <p class="text-white">Log Out</p>
          </a>
      </div>
    </div>
  </nav>

  @if($winners->isNotEmpty())
  <section id="scholar-winners" class="mb-14 flex justify-center w-full">
    <div class="container" data-aos="fade-down">
      <div class="flex flex-col text-center items-center justify-center px-24 py-16">
        <p class="font-semibold text-5xl">Winners</p>
        <div class="w-[1000px] min-h-[2px] bg-black mt-3"></div>
      </div>
      <div class="flex flex-row items-center justify-center text-center">
        @foreach ($winners as $winner)
        @php
            $bgColor = '';
            if ($winner->position == '1') {
                $bgColor = 'bg-[#feeb89]';
            } elseif ($winner->position == '2') {
                $bgColor = 'bg-[#e5e5e5]';
            } elseif ($winner->position == '3') {
                $bgColor = 'bg-[#e6be7f]';
            }
        @endphp
        {{-- perulangan --}}
        <div class="cardview-5 {{ $bgColor }} flex flex-col text-center justify-center items-center mx-5 rounded-2xl border border-gray-400">
          <p class="font-medium">#{{ $winner->position }}</p>
          <p>{{ $winner->competition_participants->fullname }}</p>
          <p>{{ $winner->competition_participants->nim }}</p>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  @endif

  @if($competitionParticipants->isNotEmpty())
  <section id="scholar-participants" class="flex justify-center w-full">
    <div class="container" data-aos="fade-up">
      <div class="flex flex-col text-center items-center justify-center px-24 pt-2 pb-16">
        <p class="font-semibold text-5xl">Participants</p>
        <div class="w-[1000px] min-h-[2px] bg-black mt-3"></div>
      </div>
      <div class="flex flex-row flex-wrap items-center justify-center text-center">
        @foreach ($competitionParticipants as $cp)
        {{-- perulangan --}}
        <div class="cardview-5 flex flex-col text-center justify-center items-center mx-5 rounded-2xl mb-8 border border-gray-400">
          <p>{{ $cp->fullname }}</p>
          <p>{{ $cp->nim }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @else
  <section id="scholar-participants" class="flex text-center justify-center w-full">
    <p class="font-semibold text-3xl mt-40 mb-28">Data is Empty</p>
  </section>
  @endif

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
