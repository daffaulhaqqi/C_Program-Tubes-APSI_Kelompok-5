@extends('layout.admin.master')
@section('title', 'Create Competition')
@section('content')
    <main class="p-6">
        <div class="flex flex-col gap-6">
            <div class="card">
                <div class="p-6">
                    <h4 class="card-title mb-4">Browser defaults</h4>
                    <form action="{{ route('competition.store') }}" method="post" class="grid lg:grid-cols-3 gap-6"
                        enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="name" class="text-gray-800 text-sm font-medium inline-block mb-2">Competition
                                Name</label>
                            <input class="form-input" type="text" name="name" id="name"
                                placeholder="Enter Competition Name" required>
                        </div>


                        <div>
                            <label for="organizer" class="text-gray-800 text-sm font-medium inline-block mb-2">Competition
                                Organizer</label>
                            <input class="form-input" type="text" name="organizer" id="organizer"
                                placeholder="Enter Competition Organizer" required>
                        </div>

                        <div>
                            <label for="rules" class="text-gray-800 text-sm font-medium inline-block mb-2">Competition
                                Rules Link</label>
                            <input type="url" class="form-input" name="rules" id="rules"
                                placeholder="Enter Competition Rules Link" required>
                        </div>



                        <div>
                            <label for="start_registration"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Start Registration</label>
                            <input class="form-input" type="date" name="start_registration" id="start_registration"
                                required>
                        </div>
                        <div>
                            <label for="end_registration" class="text-gray-800 text-sm font-medium inline-block mb-2">End
                                Registration</label>
                            <input class="form-input" type="date" name="end_registration" id="end_registration" required>
                        </div>
                        <div>
                            <label for="start_competition" class="text-gray-800 text-sm font-medium inline-block mb-2">Start
                                Competition</label>
                            <input class="form-input" type="date" name="start_competition" id="start_competition"
                                required>
                        </div>
                        <div>
                            <label for="end_competition" class="text-gray-800 text-sm font-medium inline-block mb-2">End
                                Competition</label>
                            <input class="form-input" type="date" name="end_competition" id="end_competition" required>
                        </div>
                        <div>
                            <label for="description"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Description</label>
                            <textarea rows="4" class="form-textarea" name="description" id="description"
                                placeholder="Enter Competition Description"></textarea>
                        </div>

                        <div class="col-span-3">
                            <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Photo</label>
                            <input type="file" name="image" id="image" required class="dropify"
                                data-default-file="Competititon Pamflet" />
                        </div>

                        <div class="col-span-3">
                            <button type="submit" class="btn bg-primary text-white">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </main>
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
