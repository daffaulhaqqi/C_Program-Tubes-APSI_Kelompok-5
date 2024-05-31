@extends('layout.admin.master')
@section('title', 'Detail Scholarship')
@section('content')
    <div class="grid lg gap-6 mt-8">


        <div class="card bg-white overflow-hidden">
            <div class="card overflow-hidden sm:rounded-md rounded-none">
                <div class="px-6 py-8 flex gap-10">
                    <div class="mt-6 mb-4">
                        <img src="{{ asset('/storage/scholarship-images/' . $scholarships->image) }}"
                            class="h-auto max-w-full" alt="thumbnail" style="max-width:12rem">
                    </div>
                    <div class="mt-6 mb-4">
                        <p class="text-dark/75 mb-6 text-xl mt-3">{{ $scholarships->name }}</p>
                        <div class="grid lg:grid-cols-3 gap-6">
                            <div class="grid lg:grid-cols-2 gap-6">
                                <h3>Organizer</h3>
                                <p>{{ $scholarships->organizer }}</p>
                                <h3>Description</h3>
                                <p>{{ $scholarships->description }}</p>
                                <h3>Start Registration</h3>
                                <p>{{ $scholarships->start_registration }}</p>

                            </div>
                            <div class="grid lg:grid-cols-2 gap-6">
                                <h3>End Registration</h3>
                                <p>{{ $scholarships->end_registration }}</p>
                                <h3>Start Scholarship</h3>
                                <p>{{ $scholarships->start_scholarship }}</p>
                                <h3>End Scholarship</h3>
                                <p>{{ $scholarships->end_scholarship }}</p>
                            </div>
                            <div class="flex flex-col justify-between">
                                <a class="btn bg-primary text-white" href="{{ $scholarships->requirement }}"
                                    target="_blank">View
                                    Rules</a>
                                <a class="btn bg-primary text-white"
                                    href="{{ route('scholarship.delete', $scholarships->id) }}">Delete</a>
                                <a class="btn bg-primary text-white"
                                    href="{{ route('scholarship.edit', $scholarships->id) }}">Edit</a>
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
