@extends('layout.admin.master')
@section('title', 'Scholarship')
@section('content')
    <main class="p-6">
        <div class="grid lg gap-6 mt-1">
            <a href="/admin/scholarship/create" style="width: 20%" class="btn bg-info text-white py-2 px-3">Add
                Scholarship</a>
            <div class="card bg-white overflow-hidden">
                <div class="card-header flex justify-between">
                    <h4 class="card-title">Scholarship Table</h4>
                    <a href="{{ route('scholarship.deletelist') }}" class="btn bg-dark text-white text-xs">View Deleted List</a>
                </div>
                <div>

                    <div class="overflow-x-auto">
                        <div class="min-w-full inline-block align-middle">
                            <div class="overflow-hidden">

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">
                                                Id</th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">
                                                Image</th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">
                                                Name</th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">
                                                Organizer</th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">End
                                                Registration</th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">Start
                                                Scholarship</th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scholarships as $scholarship)
                                            <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $scholarship->id }}</td>
                                                <td> <img
                                                        src="{{ asset('/storage/scholarship-images/' . $scholarship->image) }}"
                                                        alt="" style="width: 70px; height:94px; object-fit:cover;"></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $scholarship->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $scholarship->organizer }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ \Carbon\Carbon::parse($scholarship->end_registration)->format('d-m-Y') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ \Carbon\Carbon::parse($scholarship->start_scholarship)->format('d-m-Y') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    @if ($scholarship->status == 'upcoming')
                                                    <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded">Up Coming</span>
                                                    @elseif ($scholarship->status == 'registration')
                                                    <span class="px-2 py-1 bg-success/10 text-success text-xs rounded">Registration</span>
                                                    @elseif ($scholarship->status == 'ongoing')
                                                    <span class="px-2 py-1 bg-warning/10 text-warning text-xs rounded">On Going</span>
                                                    @else
                                                    <span class="px-2 py-1 bg-secondary/10 text-secondary text-xs rounded">Finished</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="hs-dropdown relative">
                                                        <button type="button"
                                                            class="hs-dropdown-toggle btn bg-primary text-white">
                                                            Action <i class="uil uil-angle-down ms-2"></i>
                                                        </button>

                                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 bg-white shadow py-2 z-10 hidden"
                                                            style="">
                                                            @if ($scholarship->status == 'upcoming')
                                                                <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                    href="{{ route('scholarship.detail', $scholarship->id) }}">
                                                                    Detail
                                                                </a>
                                                                <hr class="my-2 border-gray-200">

                                                                <a href="{{ route('scholarship.toregistration', $scholarship->id) }}"
                                                                    class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100">Change
                                                                    to Open
                                                                    Registration</a>
                                                            @elseif ($scholarship->status == 'registration')
                                                                <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                    href="{{ route('scholarship.detail', $scholarship->id) }}">Details</a>
                                                                <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                    href="{{ route('scholarship.toongoing', $scholarship->id) }}">Change
                                                                    to Start
                                                                    Scholarship</a>
                                                                <a data-hs-overlay="#hs-slide-up-animation-modal{{ $scholarship->id }}"
                                                                    class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"href="#">View
                                                                    Participants</a>
                                                            @elseif ($scholarship->status == 'ongoing')
                                                                <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                    href="{{ route('scholarship.detail', $scholarship->id) }}">Details</a>
                                                                <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                    href="{{ route('scholarship.tofinished', $scholarship->id) }}">Change
                                                                    to Finish
                                                                    Scholarship</a>
                                                                <a data-hs-overlay="#hs-slide-up-animation-modal{{ $scholarship->id }}"
                                                                    class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"href="#">View
                                                                    Participants</a>
                                                            @else
                                                                <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                    href="{{ route('scholarship.detail', $scholarship->id) }}">Details</a>
                                                                @if ($scholarship->scholarship_participants->isNotEmpty())
                                                                    @if ($scholarship->awardees->isEmpty())
                                                                    <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                        href="javascript:;"
                                                                        data-hs-overlay="#hs-slide-up-animation-modal1{{ $scholarship->id }}">
                                                                        Select Awardee
                                                                    </a>
                                                                    @else
                                                                    <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                        href="javascript:;"
                                                                        data-hs-overlay="#hs-slide-up-animation-modal2{{ $scholarship->id }}">
                                                                        Edit Awardee
                                                                    </a>
                                                                    @endif
                                                                @endif
                                                                <hr class="my-2 border-gray-200">
                                                                <a data-hs-overlay="#hs-slide-up-animation-modal{{ $scholarship->id }}"
                                                                    class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"href="#">View
                                                                    Awardee</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- Select Awardee Modal --}}
                                            <div id="hs-slide-up-animation-modal1{{ $scholarship->id }}"
                                                class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                                                <div
                                                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-14 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                    <div class="flex flex-col bg-white border shadow-sm rounded-xl">


                                                        <div class="flex justify-between items-center py-3 px-4 border-b">
                                                            <h3 class="font-bold text-gray-800">
                                                                Select Awardee
                                                            </h3>
                                                            <button type="button"
                                                                class="hs-dropup-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm"
                                                                data-hs-overlay="#hs-slide-up-animation-modal1{{ $scholarship->id }}">
                                                                <span class="sr-only">Close</span>
                                                                <svg class="w-3.5 h-3.5" width="8" height="8"
                                                                    viewBox="0 0 8 8" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('scholarship.selectawardee', $scholarship->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="p-4 overflow-y-auto flex flex-col gap-3">
                                                                @php
                                                                    $participant =
                                                                        $scholarship->scholarship_participants;
                                                                @endphp
                                                                @foreach ($participant as $participants)
                                                                    <div>

                                                                        <input type="checkbox" name="awardee[]"
                                                                            value="{{ $participants->id }}">
                                                                        <label
                                                                            for="awardee[]">{{ $participants->fullname }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div
                                                                class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                                                <button type="button"
                                                                    class="hs-dropup-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm"
                                                                    data-hs-overlay="#hs-slide-up-animation-modal1{{ $scholarship->id }}">
                                                                    Close
                                                                </button>
                                                                <button type="submit"
                                                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                                                    Save changes
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Modal --}}

                                            {{-- View Winner Modal --}}
                                            <div id="hs-slide-up-animation-modal{{ $scholarship->id }}"
                                                class="hs-overlay w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto hidden">
                                                <div
                                                    class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-3xl sm:w-full m-3 sm:mx-auto">

                                                    <div class="flex flex-col bg-white border shadow-sm rounded-xl">

                                                    </div>


                                                    <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                                                        <div class="flex justify-between items-center py-3 px-4 border-b">
                                                            <h3 class="font-bold text-gray-800">
                                                                Winner
                                                            </h3>
                                                            <button type="button"
                                                                class="hs-dropup-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm"
                                                                data-hs-overlay="#hs-slide-up-animation-modal{{ $scholarship->id }}">
                                                                <span class="sr-only">Close</span>
                                                                <svg class="w-3.5 h-3.5" width="8" height="8"
                                                                    viewBox="0 0 8 8" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        @php
                                                            $awardees = $scholarship->awardees;
                                                        @endphp
                                                        @if ($awardees->isNotEmpty())
                                                            <div class="grid grid-cols-3 p-4 overflow-y-auto flex gap-3">
                                                                @foreach ($awardees as $w)
                                                                    <div class="card">
                                                                        <div class="p-5 flex items-center justify-between">
                                                                            <span>
                                                                                <span
                                                                                    class="text-slate-400 font-semibold block">Awardees
                                                                                    {{ $loop->iteration }}</span>
                                                                                <span
                                                                                    class="text-xl font-semibold"><span>{{ $w->scholarship_participants->fullname }}</span></span>
                                                                            </span>


                                                                        </div>


                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        @if ($participant->isNotEmpty())
                                                            <div class="w-full p-4">
                                                                <h1>Participant : </h1>
                                                                <div
                                                                    class="grid grid-cols-4 p-4 overflow-y-auto flex gap-3 w-full">
                                                                    @foreach ($participant as $p)
                                                                        <p>{{ $loop->iteration }}) {{ $p->fullname }}
                                                                        </p>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div
                                                            class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                                            <button type="button"
                                                                class="hs-dropup-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm"
                                                                data-hs-overlay="#hs-slide-up-animation-modal{{ $scholarship->id }}">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end --}}

                                            {{-- Edit Awardee Modal --}}
                                            <div id="hs-slide-up-animation-modal2{{ $scholarship->id }}"
                                                class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                                                <div
                                                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-14 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                    <div class="flex flex-col bg-white border shadow-sm rounded-xl">


                                                        <div class="flex justify-between items-center py-3 px-4 border-b">
                                                            <h3 class="font-bold text-gray-800">
                                                                Edit Awardee
                                                            </h3>
                                                            <button type="button"
                                                                class="hs-dropup-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm"
                                                                data-hs-overlay="#hs-slide-up-animation-modal2{{ $scholarship->id }}">
                                                                <span class="sr-only">Close</span>
                                                                <svg class="w-3.5 h-3.5" width="8" height="8"
                                                                    viewBox="0 0 8 8" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('scholarship.editawardee', $scholarship->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="p-4 overflow-y-auto flex flex-col gap-3">
                                                                @php
                                                                    $participant = $scholarship->scholarship_participants;
                                                                    $awardee = $scholarship->awardees->pluck('scholarship_participant_id')->toArray();
                                                                @endphp
                                                                @foreach ($participant as $participants)
                                                                    <div>

                                                                        <input type="checkbox" name="awardee[]"  {{ in_array($participants->id, $awardee) ? 'checked' : '' }}
                                                                            value="{{ $participants->id }}">
                                                                        <label
                                                                            for="awardee[]">{{ $participants->fullname }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div
                                                                class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                                                <button type="button"
                                                                    class="hs-dropup-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm"
                                                                    data-hs-overlay="#hs-slide-up-animation-modal2{{ $scholarship->id }}">
                                                                    Close
                                                                </button>
                                                                <button type="submit"
                                                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                                                    Save changes
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Modal --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
            <div class="pagination flex justify-end">
                {{ $scholarships->links() }}
            </div>
        </div>


    </main>
    @if ($errors->any())
    <script>
        var errorMessage = @json($errors->all());
        alert(errorMessage.join('\n'));
    </script>
    @endif
@endsection
