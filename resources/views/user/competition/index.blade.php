{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <h1>Ini Index Competition</h1>
    <a href="{{ route('user.dashboard') }}">Back to dashboard</a>
    <table>
        <thead>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Organizer</th>
            <th>End Registration</th>
            <th>Start Competition</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($competitions as $competition)
            <tr>
                <td>{{$competition->id}}</td>
                <td> <img src="{{ asset('/storage/competition-images/' . $competition->image) }}" alt="" style="width: 50px;"></td>
                <td>{{$competition->name}}</td>
                <td>{{$competition->organizer}}</td>
                <td>{{$competition->end_registration}}</td>
                <td>{{$competition->start_competition}}</td>
                <td>{{$competition->status}}</td>
                <td>
                    @if ($competition->status == 'registration' || $competition->status == 'upcoming')
                        <a href="{{ route('user.competition.details', $competition->id) }}">Details</a>
                        <a href="{{ route('user.competition.enroll', $competition->id) }}">Enroll</a>
                    @elseif ($competition->status == 'finished')
                        <a href="{{ route('user.competition.details', $competition->id) }}">Details</a>
                        <a href="">Leaderboard</a>
                    @else
                        <a href="{{ route('user.competition.details', $competition->id) }}">Details</a>
                    @endif
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
  <title>Competitions | Portal Prestasi</title>
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

  <!-- HERO -->
  <section id="comp-hero" class="flex items-center justify-center w-full">
    <div class="container flex flex-col items-center text-center justify-center py-16 px-24" data-aos="fade-down">
      <h1 class="font-semibold text-5xl">Competitions</h1>
      <p class="mt-3 text-lg">Compete, Shine, and Reach New Heights with Our Latest Opportunities</p>
      <div class="w-[1000px] min-h-[2px] bg-black mt-3"></div>
    </div>
  </section>

  <!-- COMP-LIST -->
  <section id="comp-list" class="px-20 flex items-center justify-center w-full">
    <div class="grid grid-cols-2 gap-12 container px-24 flex flex-col items-center text-center justify-center">
        @foreach ($competitions as $competition)
        <div class="cardview-3 rounded-2xl" data-aos="fade-left">
          <div class="px-10 justify-center py-8 text-left ">
            <h1 class="font-semibold text-2xl mb-6">{{ $competition->name }}</h1>
            <div class="flex space-x-4 col-start-1 col-end-2"><a href="{{ route('user.competition.details', $competition->id) }}"><img src="{{ asset('storage/competition-images/' . $competition->image) }}" alt="" class="w-[160px] float-left mr-10 img-list-hover" style="aspect-ratio:2/3; object-fit:cover"></a>
                <div style="display:flex; flex-direction:column; justify-content:space-between;">
                    <div class="gap-1">
                        <p class="text-md mb-2">Organizer : {{ $competition->organizer }}</p>
                        @if ($competition->status == 'upcoming')
                        <p class="text-md mb-2">
                            Status :<span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10 ml-1">Coming Soon</span>
                        </p>
                        @elseif ($competition->status == 'registration')
                        <p class="text-md mb-2">
                            Status :<span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 ml-1">Registration</span>
                        </p>
                        @elseif ($competition->status == 'ongoing')
                        <p class="text-md mb-2">
                            Status :<span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20 ml-1">On Going</span>
                        </p>
                        @else
                        <p class="text-md mb-2">
                            Status :<span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 ml-1">Finished</span>
                        </p>
                        @endif
                        <p class="text-md">Registration:</p>
                        <p class="text-md mb-2">{{ \Carbon\Carbon::parse($competition->start_registration)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($competition->end_registration)->format('d-m-Y') }}</p>
                        <p class="text-md">Competition:</p>
                        <p class="text-md">{{ \Carbon\Carbon::parse($competition->start_competition)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($competition->end_competition)->format('d-m-Y') }}</p>

                    </div>

                    <div class="flex flex-wrap gap-1">
                        <a href="{{ route('user.competition.details', $competition->id) }}" class="btn-secondary bg-transparent border border-gray-400 px-[10px] py-[7px] rounded-2xl text-sm">Details</a>
                        @if ($competition->status == 'registration')
                            @if ($competition->competition_participants->where('user_id', $users->id)->isEmpty())
                            <a href="{{ route('user.competition.enroll', $competition->id) }}" class="btn-primary px-[20px] py-[7px] rounded-2xl text-white text-sm">Enroll</a>
                            @elseif ($competition->competition_participants->where('user_id', $users->id)->isNotEmpty())
                            <a href="{{ route('user.competition.participant', $competition->id) }}" class="btn-secondary bg-transparent border border-gray-400 px-[10px] py-[7px] rounded-2xl text-sm">View Participants</a>
                            @endif
                        @elseif ($competition->status == 'ongoing')
                        <a href="{{ route('user.competition.participant', $competition->id) }}" class="btn-secondary bg-transparent border border-gray-400 px-[10px] py-[7px] rounded-2xl text-sm">View Participants</a>
                        @elseif ($competition->status == 'finished')
                        <a href="{{ route('user.competition.participant', $competition->id) }}" class="btn-secondary bg-transparent border border-gray-400 px-[10px] py-[7px] rounded-2xl text-sm">View Winners</a>
                        @endif
                    </div>
                </div>
            </div>

          </div>
        </div>
        @endforeach
    </div>
  </section>

  <div class="pagination flex flex-col items-center mt-24">
    {{ $competitions->links() }}
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
