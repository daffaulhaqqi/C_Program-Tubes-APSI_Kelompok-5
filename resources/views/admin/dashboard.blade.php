@extends('layout.admin.master')
@section('title', 'Dashboard')
@section('content')
    <main class="p-6">
        {{-- content 1 --}}
        <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
            <div class="card">
                <div class="p-5 flex items-center justify-between">
                    <span>
                        <span class="text-slate-400 font-semibold block">Total Competition</span>
                        <span class="text-xl font-semibold"><span>{{ $countCompetitions }}</span></span>
                    </span>

                    <span
                        class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                        <i class="uil uil-trophy text-xl"></i>
                    </span>
                </div>

                <div class="px-5 py-4 bg-slate-50">
                    <a href="/admin/competition/index"
                        class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-blue-600 hover:text-blue-600 after:bg-blue-600">View
                        data <i class="uil uil-arrow-right"></i></a>
                </div>
            </div><!--end-->

            <div class="card">
                <div class="p-5 flex items-center justify-between">
                    <span>
                        <span class="text-slate-400 font-semibold block">Total Scholarship</span>
                        <span class="text-xl font-semibold"><span>{{ $countScholarships }}</span></span>
                    </span>

                    <span
                        class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                        <i class="uil uil-graduation-cap text-xl"></i>
                    </span>
                </div>

                <div class="px-5 py-4 bg-slate-50">
                    <a href="/admin/scholarship/index"
                        class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-blue-600 hover:text-blue-600 after:bg-blue-600">View
                        data <i class="uil uil-arrow-right"></i></a>
                </div>
            </div><!--end-->

            <div class="card">
                <div class="p-5 flex items-center justify-between">
                    <span>
                        <span class="text-slate-400 font-semibold block">Total Jobs</span>
                        <span class="text-xl font-semibold"><span>{{ $countWorks }}</span></span>
                    </span>

                    <span
                        class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                        <i class="uil uil-briefcase text-xl"></i>
                    </span>
                </div>

                <div class="px-5 py-4 bg-slate-50">
                    <a href="/admin/work/index"
                        class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-blue-600 hover:text-blue-600 after:bg-blue-600">View
                        data <i class="uil uil-arrow-right"></i></a>
                </div>
            </div><!--end-->

            <div class="card">
                <div class="p-5 flex items-center justify-between">
                    <span>
                        <span class="text-slate-400 font-semibold block">Total Users</span>
                        <span class="text-xl font-semibold"><span>{{ $countUsers }}</span></span>
                    </span>

                    <span
                        class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                        <i class="uil uil-users-alt text-xl"></i>
                    </span>
                </div>

                <div class="px-5 py-4 bg-slate-50">
                    <a href="/admin/dashboard"
                        class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-blue-600 hover:text-blue-600 after:bg-blue-600">View
                        data <i class="uil uil-arrow-right"></i></a>
                </div>
            </div><!--end-->
        </div>

        {{-- content 2 --}}
        <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
            <div class="card">
                <div class="p-5 flex items-center justify-between">
                    <span>
                        <span class="text-slate-400 font-semibold block">Total Active Competitions</span>
                        <span class="text-xl font-semibold"><span>{{ $activeCompetitions }}</span></span>
                    </span>

                    <span
                        class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                        <i class="uil uil-file-check-alt text-xl"></i>
                    </span>
                </div>
            </div><!--end-->

            <div class="card">
                <div class="p-5 flex items-center justify-between">
                    <span>
                        <span class="text-slate-400 font-semibold block">Average Competition Participant</span>
                        <span class="text-xl font-semibold"><span>{{ $averageCompetitionParticipantCount }}</span></span>
                    </span>

                    <span
                        class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                        <i class="uil uil-user-arrows text-xl"></i>
                    </span>
                </div>
            </div><!--end-->

            <div class="card">
                <div class="p-5 flex items-center justify-between">
                    <span>
                        <span class="text-slate-400 font-semibold block">Total Active Scholarships</span>
                        <span class="text-xl font-semibold"><span>{{ $activeScholarships }}</span></span>
                    </span>

                    <span
                        class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                        <i class="uil uil-file-check-alt text-xl"></i>
                    </span>
                </div>
            </div><!--end-->

            <div class="card">
                <div class="p-5 flex items-center justify-between">
                    <span>
                        <span class="text-slate-400 font-semibold block">Average Scholarship Participant</span>
                        <span class="text-xl font-semibold"><span>{{ $averageScholarshipParticipantCount }}</span></span>
                    </span>

                    <span
                        class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                        <i class="uil uil-user-arrows text-xl"></i>
                    </span>
                </div>
            </div><!--end-->
        </div>

        {{-- content 3 --}}
        <div class="grid xl:grid-cols-2 gap-6">
            <div class="card overflow-hidden">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">Competition Participant Activity</h4>
                    <a href="/admin/competition/index" class="btn btn-sm bg-light text-sm text-gray-800 ">View More</a>
                </div>

                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle whitespace-nowrap">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-light/40 border-b border-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 text-start">Id</th>
                                        <th class="px-6 py-3 text-start">User</th>
                                        <th class="px-6 py-3 text-start">Competition</th>
                                        <th class="px-6 py-3 text-start">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tableComPars as $tcp)
                                    <tr class="border-b border-gray-200">
                                        <td class="px-6 py-3">{{ $tcp->users->id }}</td>
                                        <td class="px-6 py-3">{{ $tcp->fullname }}</td>
                                        <td class="px-6 py-3">
                                            {{ $tcp->competitions->name }}
                                        <td class="px-6 py-3">
                                            @if ($tcp->competitions->status == 'upcoming')
                                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded">Up Coming</span>
                                            @elseif ($tcp->competitions->status == 'registration')
                                            <span class="px-2 py-1 bg-success/10 text-success text-xs rounded">Registration</span>
                                            @elseif ($tcp->competitions->status == 'ongoing')
                                            <span class="px-2 py-1 bg-warning/10 text-warning text-xs rounded">On Going</span>
                                            @else
                                            <span class="px-2 py-1 bg-secondary/10 text-secondary text-xs rounded">Finished</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->

            <div class="card overflow-hidden">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">Scholarship Participant Activity</h4>
                    <a href="/admin/scholarship/index" class="btn btn-sm bg-light text-sm text-gray-800 ">View More</a>
                </div>

                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle whitespace-nowrap">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-light/40 border-b border-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 text-start">Id</th>
                                        <th class="px-6 py-3 text-start">User</th>
                                        <th class="px-6 py-3 text-start">Scholarship</th>
                                        <th class="px-6 py-3 text-start">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tableScholarPars as $tcp)
                                    <tr class="border-b border-gray-200">
                                        <td class="px-6 py-3">{{ $tcp->users->id }}</td>
                                        <td class="px-6 py-3">{{ $tcp->fullname }}</td>
                                        <td class="px-6 py-3">
                                            {{ $tcp->scholarships->name }}
                                        <td class="px-6 py-3">
                                            @if ($tcp->scholarships->status == 'upcoming')
                                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded">Up Coming</span>
                                            @elseif ($tcp->scholarships->status == 'registration')
                                            <span class="px-2 py-1 bg-success/10 text-success text-xs rounded">Registration</span>
                                            @elseif ($tcp->scholarships->status == 'ongoing')
                                            <span class="px-2 py-1 bg-warning/10 text-warning text-xs rounded">On Going</span>
                                            @else
                                            <span class="px-2 py-1 bg-secondary/10 text-secondary text-xs rounded">Finished</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>

    </main>
@endsection
