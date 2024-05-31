{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
</head>
<body>
    <h1>Detail Competition</h1>
    <img src="{{ asset('/storage/competition-images/'. $competitions->image) }}" alt="" style="width: 200px">
    <h3>Name</h3>
    <p>{{ $competitions->name }}</p>
    <h3>Organizer</h3>
    <p>{{ $competitions->organizer }}</p>
    <h3>Description</h3>
    <p>{{ $competitions->description }}</p>
    <h3>Start Registration</h3>
    <p>{{ $competitions->start_registration }}</p>
    <h3>End Registration</h3>
    <p>{{ $competitions->end_registration }}</p>
    <h3>Start Competition</h3>
    <p>{{ $competitions->start_competition }}</p>
    <h3>End Competition</h3>
    <p>{{ $competitions->end_competition }}</p>
    <h3>Status</h3>
    <p>{{ $competitions->status }}</p>
    <h3>Action</h3>
    <a href="{{ $competitions->rules }}" target="_blank">View Rules</a>
    <a href="{{ route('user.competition.enroll', $competitions->id) }}">Enroll</a>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Details | Portal Prestasi</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logofix.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/colors.css') }}" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body id="details">
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

    <section class="flex justify-center w-full">
        <div class="flex flex-row px-40 py-24">
          <img src="{{ asset('storage/competition-images/' . $competitions->image) }}" alt="" class="w-[320px] h-[440px] border border-[#d24d49] rounded-2xl object-cover" data-aos="fade-right">
          <div class="flex-col ml-24" data-aos="fade-left">
            <p class="form-underline font-semibold text-4xl">{{ $competitions->name }}</p>
            <p class="mt-8 mb-8">{{ $competitions->description }}</p>
            <div class="grid grid-cols-2">
              <div class="flex flex-row gap-2 mt-6 pr-10">
                <p class="font-medium">Organizer :</p>
                <p>{{ $competitions->organizer }}</p>
              </div>
              <div class="flex flex-row gap-2 mt-6 pr-10">
                <p class="font-medium">Status :</p>
                @if ($competitions->status == 'upcoming')
                <p class="text-md mb-2">
                    <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-sm font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10 ml-1">Coming Soon</span>
                </p>
                @elseif ($competitions->status == 'registration')
                <p class="text-md mb-2">
                    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-sm font-medium text-green-700 ring-1 ring-inset ring-green-600/20 ml-1">Registration</span>
                </p>
                @elseif ($competitions->status == 'ongoing')
                <p class="text-md mb-2">
                    <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20 ml-1">On Going</span>
                </p>
                @else
                <p class="text-md mb-2">
                    <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-sm font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 ml-1">Finished</span>
                </p>
                @endif
              </div>
              <div class="flex flex-row gap-2 mt-6 pr-10">
                <p class="font-medium">Start Registration :</p>
                <p>{{ $competitions->start_registration }}</p>
              </div>
              <div class="flex flex-row gap-2 mt-6 pr-10">
                <p class="font-medium">Start Competition :</p>
                <p>{{ $competitions->start_competition }}</p>
              </div>
              <div class="flex flex-row gap-2 mt-6 pr-10">
                <p class="font-medium">End Registration :</p>
                <p>{{ $competitions->end_registration }}</p>
              </div>
              <div class="flex flex-row gap-2 mt-6 pr-10">
                <p class="font-medium">End Competition :</p>
                <p>{{ $competitions->end_competition }}</p>
              </div>
            </div>
            <div class="mt-24">
                <a href="{{ $competitions->rules }}" class="btn-secondary border border-gray-400 rounded-2xl px-10 py-2" target="_blank">Rules</a>
                @if ($competitions->status == 'registration')
                    @if ($competitions->competition_participants->where('user_id', $users->id)->isEmpty())
                    <a href="{{ route('user.competition.enroll', $competitions->id) }}" class="btn-primary text-white rounded-2xl px-10 py-2">Enroll</a>
                    @elseif ($competitions->competition_participants->where('user_id', $users->id)->isNotEmpty())
                    <a href="{{ route('user.competition.participant', $competitions->id) }}" class="btn-secondary border border-gray-400 rounded-2xl px-10 py-2">View Participants</a>
                    @endif
                @elseif ($competitions->status == 'ongoing')
                <a href="{{ route('user.competition.participant', $competitions->id) }}" class="btn-secondary border border-gray-400 rounded-2xl px-10 py-2">View Participants</a>
                @elseif ($competitions->status == 'finished')
                <a href="{{ route('user.competition.participant', $competitions->id) }}" class="btn-secondary border border-gray-400 rounded-2xl px-10 py-2">View Winners</a>
                @endif
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
   @if ($errors->any())
   <script>
       var errorMessage = @json($errors->all());
       alert(errorMessage.join('\n'));
   </script>
   @endif
</body>

</html>
