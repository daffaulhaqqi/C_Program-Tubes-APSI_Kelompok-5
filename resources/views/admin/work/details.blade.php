@extends('layout.admin.master')
@section('title', 'Detail Job')
@section('content')
    <div class="grid lg gap-6 mt-8">


        <div class="card bg-white overflow-hidden">
            <div class="card overflow-hidden sm:rounded-md rounded-none">
                <div class="px-6 py-8 flex gap-10">
                    <div class="mt-6 mb-4">
                        <img src="{{ asset('/storage/work-images/' . $works->image) }}" class="h-auto max-w-full"
                            alt="thumbnail" style="max-width:12rem">
                    </div>
                    <div class="mt-6 mb-4">
                        <p class="text-dark/75 mb-6 text-xl mt-3">{{ $works->job_name }}</p>
                        <div class="grid lg:grid-cols-3 gap-6">
                            <div class="grid lg:grid-cols-2 gap-6">
                                <h3>Organizer</h3>
                                <p>{{ $works->company }}</p>
                                <h3>Description</h3>
                                <p>{{ $works->description }}</p>
                            </div>
                            <div class="grid lg:grid-cols-2 gap-6">
                                <h3>Salary</h3>
                                <p>{{ $works->salary }}</p>
                                <h3>Email</h3>
                                <p>{{ $works->email }}</p>
                                <h3>Contact</h3>
                                <p>{{ $works->contact }}</p>
                            </div>
                            <div class="flex flex-col justify-between">
                                <a class="btn bg-primary text-white" href="{{ $works->information }}" target="_blank">View
                                    Information</a>
                                <a class="btn bg-primary text-white"
                                    href="{{ route('work.delete', $works->id) }}">Delete</a>
                                <a class="btn bg-primary text-white" href="{{ route('work.edit', $works->id) }}">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    @if ($errors->any())
    <script>
        var errorMessage = @json($errors->all());
        alert(errorMessage.join('\n'));
    </script>
    @endif
@endsection
