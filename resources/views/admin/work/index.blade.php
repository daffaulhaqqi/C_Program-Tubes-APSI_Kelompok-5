@extends('layout.admin.master')
@section('title', 'Job Vacancy')
@section('content')
    <main class="p-6">
        <div class="grid lg gap-6 mt-1">
            <a href="/admin/work/create" style="width: 20%" class="btn bg-info text-white py-2 px-3">Add Job Vacancy</a>
            <div class="card bg-white overflow-hidden">
                <div class="card-header flex justify-between">
                    <h4 class="card-title">Job Vacancy Table</h4>
                    <a href="{{ route('work.deletelist') }}" class="btn bg-dark text-white text-xs">View Deleted List</a>
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
                                                Job Name</th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">
                                                Company</th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">Email</th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">Salary
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($works as $work)
                                            <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $work->id }}</td>
                                                <td class="flex ms-2"> <img src="{{ asset('/storage/work-images/' . $work->image) }}"
                                                        alt="" style="width: 60px; height:60px; object-fit:cover; text-align:center;"></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $work->job_name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $work->company }}</td>
                                                <td>{{ $work->email }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    Rp. {{ $work->salary }}</td>

                                                <td>
                                                    <div class="hs-dropdown relative">
                                                        <button type="button"
                                                            class="hs-dropdown-toggle btn bg-primary text-white">
                                                            Action <i class="uil uil-angle-down ms-2"></i>
                                                        </button>

                                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 bg-white shadow py-2 z-10 hidden"
                                                            style="min-width:5.6rem">
                                                            <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                href="{{ route('work.detail', $work->id) }}">
                                                                Details</a>
                                                            <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                href="{{ route('work.edit', $work->id) }}">
                                                                Edit</a>
                                                            <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100"
                                                                href="{{ $work->information }}" target="_blank">
                                                                See
                                                                Info</a>
                                                        </div>
                                                    </div>
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
            <div class="pagination flex justify-end">
                {{ $works->links() }}
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
