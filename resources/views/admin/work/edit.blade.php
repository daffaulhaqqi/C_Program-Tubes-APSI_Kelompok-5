@extends('layout.admin.master')
@section('title', 'Edit Job')
@section('content')
    <div class=" gap-6 mt-8">

        <div class="flex flex-col gap-6">
            <div class="card">
                <div class="p-6">
                    <h4 class="card-title mb-4">Browser defaults</h4>
                    <form action="{{ route('work.update', $works->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div>
                            <label for="job_name" class="text-gray-800 text-sm font-medium inline-block mb-2">Job
                                Name</label>
                            <input class="form-input" type="text" name="job_name" id="job_name"
                                value="{{ $works->job_name }}" required>
                        </div>
                        <div>
                            <label for="company"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Company</label>
                            <input class="form-input" type="text" name="company" id="company"
                                value="{{ $works->company }}" required>
                        </div>

                        <div>
                            <label for="information"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Information's
                                Link</label>
                            <input type="url" class="form-input" name="information" id="information"
                                value="{{ $works->information }}" required>
                        </div>

                        <div>
                            <label for="contact"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Contact</label>
                            <input class="form-input" type="tel" name="contact" id="contact"
                                value="{{ $works->contact }}" required>
                        </div>

                        <div>
                            <label for="contact" class="text-gray-800 text-sm font-medium inline-block mb-2">Salary</label>
                            <input class="form-input" type="number" name="salary" id="salary"
                                value="{{ $works->salary }}" required>
                        </div>

                        <div>
                            <label for="email" class="text-gray-800 text-sm font-medium inline-block mb-2">Company
                                Email</label>
                            <input class="form-input" type="email" name="email" id="email"
                                value="{{ $works->email }}" required>
                        </div>

                        <div class="col-span-3">
                            <label for="description"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Description</label>
                            <textarea rows="4" class="form-textarea" name="description" id="description">{{ $works->description }}</textarea>
                        </div>

                        <div class="col-span-3">
                            <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Photo</label>
                            <input type="file" name="image" id="image" class="dropify"
                                data-default-file="Company Logo" />
                        </div>

                        <div class="col-span-3 mt-3">
                            <button type="submit" class="btn bg-primary text-white">Submit</button>
                            <a href="{{ route('work.detail', $works->id) }}" class="btn bg-primary text-white">Back</a>
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
