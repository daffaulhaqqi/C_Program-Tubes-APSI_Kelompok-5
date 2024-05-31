@extends('layout.admin.master')
@section('title', 'Scholarship Deleted List')
@section('content')
    <main class="p-6">
        <div class="grid lg gap-6 mt-1">
            <a href="/admin/scholarship/index" style="width: 20%" class="btn bg-secondary text-white py-1 px-3">
                <i class="uil uil-arrow-left text-xl me-2"></i>
                Back
            </a>
            <div class="card bg-white overflow-hidden">
                <div class="card-header">
                    <h4 class="card-title">Scholarship Table</h4>
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
                                                <td>{{ $scholarship->end_registration }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $scholarship->start_scholarship }}</td>
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
                                                    <a type="button"
                                                       class="hs-dropdown-toggle btn bg-primary text-white text-xs px-5"
                                                       href="{{ route('scholarship.restore', $scholarship->id) }}">
                                                       Restore
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div>


    </main>
    @if ($errors->any())
    <script>
        var errorMessage = @json($errors->all());
        alert(errorMessage.join('\n'));
    </script>
    @endif
@endsection
