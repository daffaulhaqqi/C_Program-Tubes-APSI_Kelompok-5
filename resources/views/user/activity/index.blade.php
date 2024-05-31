{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity</title>
</head>
<body>
    <h1>Activity</h1>
    <h2>Ini Competition</h2>
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

    <h2>Ini Scholarship</h2>
    <table>
        <thead>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Organizer</th>
            <th>End Registration</th>
            <th>Start Scholarship</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($scholarships as $scholarship)
            <tr>
                <td>{{$scholarship->id}}</td>
                <td> <img src="{{ asset('/storage/scholarship-images/' . $scholarship->image) }}" alt="" style="width: 50px;"></td>
                <td>{{$scholarship->name}}</td>
                <td>{{$scholarship->organizer}}</td>
                <td>{{$scholarship->end_registration}}</td>
                <td>{{$scholarship->start_scholarship}}</td>
                <td>{{$scholarship->status}}</td>
                <td>
                    @if ($scholarship->status == 'registration' || $scholarship->status == 'upcoming')
                        <a href="{{ route('user.scholarship.details', $scholarship->id) }}">Details</a>
                    @elseif ($scholarship->status == 'finished')
                        <a href="{{ route('user.scholarship.details', $scholarship->id) }}">Details</a>
                        <a href="">Awardee</a>
                    @else
                        <a href="{{ route('user.scholarship.details', $scholarship->id) }}">Details</a>
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
	<title>Activity | Portal Prestasi</title>
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
                <a href="{{ route('user.activity.index') }}" class="py-[7px] nav-active underline">Activity</a>
                <a href="{{ route('logout') }}" class="btn-primary px-[24px] py-[7px] rounded-2xl">
                  <p class="text-white">Log Out</p>
                </a>
            </div>
		</div>
	</nav>

	<!-- TABLE -->
  <section id="activity-table" class="min-h-screen">
    <div class="flex flex-col items-center text-center justify-center py-16 px-24" data-aos="fade-down">
      <p class="text-5xl font-semibold">My Activity</p>
      <p class="mt-3 text-lg">Track your progress and manage all your activities in one place. Stay on top of your applications, deadlines,</p>
      <p class="text-lg">and achievements with ease and efficiency.</p>
      <div class="w-[1000px] min-h-[2px] bg-black mt-3"></div>
    </div>
    <div class="flex flex-col" data-aos="fade-down">
      <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
        <div class="py-2 inline-block min-w-full px-24">
          @if ($competitions->isNotEmpty())
          <div class="overflow-hidden">
              <h3 class="font-medium mb-4 text-center text-xl">Competition Activity</h3>
              <table class="min-w-full text-center">
                  <thead class="bg-white border-t border-b border-slate-400">
                      <tr>
                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                              #Id
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Competition Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Competition Organizer
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Enroll Time
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competitionParticipants as $participant)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #{{ $participant->competitions->id }}
                            </td>
                            <td class="text-sm text-slate-900 px-6 py-4 whitespace-nowrap">
                                {{ $participant->competitions->name }}
                            </td>
                            <td class="text-sm text-slate-900 px-6 py-4 whitespace-nowrap">
                                {{ $participant->competitions->organizer }}
                            </td>
                            <td class="text-sm text-slate-900 px-6 py-4 whitespace-nowrap">
                                {{ $participant->created_at }}
                            </td>
                            <td class="text-sm text-slate-900 px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('user.competition.details', $participant->competitions->id) }}" class="btn-secondary px-3 py-2  border border-gray-400 rounded-xl">Details</a>
                                @if ($participant->competitions->status == 'registration')
                                <a href="{{ route('user.competition.unenroll', $participant->id) }}" class="btn-primary px-3 py-2 text-white rounded-xl">Unenroll</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
          </div>
          @endif

          @if ($scholarships->isNotEmpty())
          <div class="overflow-hidden mt-24">
              <h3 class="font-medium mb-4 text-center text-xl">Scholarship Activity</h3>
              <table class="min-w-full text-center">
                  <thead class="bg-white border-t border-b border-slate-400">
                      <tr>
                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                              #Id
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Competition Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Competition Organizer
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Enroll Time
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scholarshipParticipants as $participant)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #{{ $participant->scholarships->id }}
                            </td>
                            <td class="text-sm text-slate-900 px-6 py-4 whitespace-nowrap">
                                {{ $participant->scholarships->name }}
                            </td>
                            <td class="text-sm text-slate-900 px-6 py-4 whitespace-nowrap">
                                {{ $participant->scholarships->organizer }}
                            </td>
                            <td class="text-sm text-slate-900 px-6 py-4 whitespace-nowrap">
                                {{ $participant->created_at }}
                            </td>
                            <td class="text-sm text-slate-900 px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('user.scholarship.details', $participant->scholarships->id) }}" class="btn-secondary px-3 py-2  border border-gray-400 rounded-xl">Details</a>
                                @if ($participant->scholarships->status == 'registration')
                                <a href="{{ route('user.scholarship.unenroll', $participant->id) }}" class="btn-primary px-3 py-2 text-white rounded-xl">Unenroll</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </tbody>
              </table>
          </div>
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
