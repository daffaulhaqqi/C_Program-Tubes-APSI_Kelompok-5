@extends('layout.admin.master')
@section('title', 'Edit Competition')
@section('content')
    <div class=" gap-6 mt-8">

        <div class="flex flex-col gap-6">
            <div class="card">
                <div class="p-6">
                    <h4 class="card-title mb-4">Browser defaults</h4>
                    <form action="{{ route('competition.update', $competitions->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div>
                            <label for="name" class="text-gray-800 text-sm font-medium inline-block mb-2">Competition
                                Name</label>
                            <input class="form-input" type="text" name="name" id="name"
                                value="{{ $competitions->name }}" required>
                        </div>
                        <div>
                            <label for="organizer" class="text-gray-800 text-sm font-medium inline-block mb-2">Competition
                                Organizer</label>
                            <input class="form-input" type="text" name="organizer" id="organizer"
                                value="{{ $competitions->organizer }}" required>
                        </div>

                        <div>
                            <label for="rules" class="text-gray-800 text-sm font-medium inline-block mb-2">Rule's
                                Link</label>
                            <input type="url" class="form-input" name="rules" id="rules"
                                value="{{ $competitions->rules }}" required>
                        </div>
                        <div>
                            <label for="start_registration"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Start Registration</label>
                            <input class="form-input" type="date" name="start_registration" id="start_registration"
                                value="{{ \Carbon\Carbon::parse($competitions->start_registration)->format('Y-m-d') }}"
                                required>
                        </div>
                        <div>
                            <label for="end_registration" class="text-gray-800 text-sm font-medium inline-block mb-2">End
                                Registration</label>
                            <input class="form-input" type="date" name="end_registration" id="end_registration"
                                value="{{ \Carbon\Carbon::parse($competitions->end_registration)->format('Y-m-d') }}"
                                required>
                        </div>
                        <div>
                            <label for="start_competition" class="text-gray-800 text-sm font-medium inline-block mb-2">Start
                                Competition</label>
                            <input class="form-input" type="date" name="start_competition" id="start_competition"
                                value="{{ \Carbon\Carbon::parse($competitions->start_competition)->format('Y-m-d') }}"
                                required>
                        </div>
                        <div>
                            <label for="end_competition" class="text-gray-800 text-sm font-medium inline-block mb-2">End
                                Competition</label>
                            <input class="form-input" type="date" name="end_competition" id="end_competition"
                                value="{{ \Carbon\Carbon::parse($competitions->end_competition)->format('Y-m-d') }}"
                                required>
                        </div>
                        <div class="col-span-3">
                            <label for="description"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Description</label>
                            <textarea rows="4" class="form-textarea" name="description" id="description">{{ $competitions->description }}</textarea>
                        </div>

                        <div class="col-span-3">
                            <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Photo</label>
                            <input type="file" name="image" id="image" class="dropify"
                                data-default-file="Competition Pamflet" />
                        </div>

                        <div class="col-span-3 mt-3">
                            <button type="submit" class="btn bg-primary text-white">Submit</button>
                            <a href="{{ route('competition.detail', $competitions->id) }}"
                                class="btn bg-primary text-white">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.dropify').dropify();
    </script>
     @if ($errors->any())
     <script>
         var errorMessage = @json($errors->all());
         alert(errorMessage.join('\n'));
     </script>
     @endif
@endsection
