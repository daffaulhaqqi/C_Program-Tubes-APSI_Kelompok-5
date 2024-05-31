@extends('layout.admin.master')
@section('title', 'Detail Competition')
@section('content')
    <div class="grid lg gap-6 mt-8">


        <div class="card bg-white overflow-hidden">
            <div class="card overflow-hidden sm:rounded-md rounded-none">
                <div class="px-6 py-8 flex gap-10">
                    <div class="mt-6 mb-4">
                        <img src="{{ asset('/storage/competition-images/' . $competitions->image) }}"
                            class="h-auto" alt="thumbnail" style="max-width:12rem">
                    </div>
                    <div class="mt-6 mb-4">
                        <p class="text-dark/75 mb-6 text-xl mt-3">{{ $competitions->name }}</p>
                        <div class="grid lg:grid-cols-3 gap-6">
                            <div class="grid lg:grid-cols-2 gap-6">
                                <h3>Organizer</h3>
                                <p>{{ $competitions->organizer }}</p>
                                <h3>Description</h3>
                                <p>{{ $competitions->description }}</p>
                                <h3>Start Registration</h3>
                                <p>{{ $competitions->start_registration }}</p>

                            </div>
                            <div class="grid lg:grid-cols-2 gap-6">
                                <h3>End Registration</h3>
                                <p>{{ $competitions->end_registration }}</p>
                                <h3>Start Competition</h3>
                                <p>{{ $competitions->start_competition }}</p>
                                <h3>End Competition</h3>
                                <p>{{ $competitions->end_competition }}</p>
                            </div>
                            <div class="flex flex-col justify-between">
                                <a class="btn bg-primary text-white" href="{{ $competitions->rules }}" target="_blank">View
                                    Rules</a>
                                <a class="btn bg-primary text-white"
                                    href="{{ route('competition.delete', $competitions->id) }}">Delete</a>
                                <a class="btn bg-primary text-white"
                                    href="{{ route('competition.edit', $competitions->id) }}">Edit</a>
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
