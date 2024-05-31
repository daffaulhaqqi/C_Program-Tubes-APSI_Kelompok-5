@extends('layout.admin.master')
@section('title', 'Job Vacancy Deleted List')
@section('content')
    <main class="p-6">
        <div class="grid lg gap-6 mt-1">
            <a href="/admin/work/index" style="width: 20%" class="btn bg-secondary text-white py-1 px-3">
                <i class="uil uil-arrow-left text-xl me-2"></i>
                Back
            </a>
            <div class="card bg-white overflow-hidden">
                <div class="card-header">
                    <h4 class="card-title">Job Vacancy Table</h4>
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
                                                <td> <img src="{{ asset('/storage/work-images/' . $work->image) }}"
                                                        alt="" style="width: 60px; height:60px; object-fit:cover;"></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $work->job_name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $work->company }}</td>
                                                <td>{{ $work->email }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $work->salary }}</td>

                                                <td>
                                                    <a type="button"
                                                       class="hs-dropdown-toggle btn bg-primary text-white text-xs px-5"
                                                       href="{{ route('work.restore', $work->id) }}">
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
