@extends('layout.admin.master')
@section('title', 'Create Job')
@section('content')
    <div class=" gap-6 mt-8">

        <div class="flex flex-col gap-6">
            <div class="card">
                <div class="p-6">
                    <h4 class="card-title mb-4">Browser defaults</h4>
                    <form action="{{ route('work.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="job_name" class="text-gray-800 text-sm font-medium inline-block mb-2">Job
                                Name</label>
                            <input class="form-input" type="text" name="job_name" id="job_name" placeholder="Enter Job Name" required>
                        </div>
                        <div>
                            <label for="company"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Company</label>
                            <input class="form-input" type="text" name="company" id="company" placeholder="Enter Company Name" required>
                        </div>

                        <div>
                            <label for="information"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Job Information
                                Link</label>
                            <input type="url" class="form-input" name="information" id="information" placeholder="Enter Job Infromation Link" required>
                        </div>

                        <div>
                            <label for="email" class="text-gray-800 text-sm font-medium inline-block mb-2">Company
                                Email</label>
                            <input class="form-input" type="email" name="email" id="email" placeholder="Enter Company Email" required>
                        </div>

                        <div>
                            <label for="contact"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Contact Person</label>
                            <input class="form-input" type="tel" name="contact" id="contact" placeholder="Enter Contact Person | Input : 628XXXXXXXXX" required>
                        </div>

                        <div>
                            <label for="contact" class="text-gray-800 text-sm font-medium inline-block mb-2">Job Salary</label>
                            <input class="form-input" type="number" name="salary" id="salary" placeholder="Enter Job Salary" required>
                        </div>

                        <div class="col-span-3">
                            <label for="description"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Job Description</label>
                            <textarea rows="4" class="form-textarea" name="description" id="description" placeholder="Enter Job Description"></textarea>
                        </div>

                        <div class="col-span-3">
                            <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Photo</label>
                            <input type="file" name="image" id="image" class="dropify"
                                data-default-file="Company Logo" />
                        </div>

                        <div class="col-span-3 mt-3">
                            <button type="submit" class="btn bg-primary text-white">Submit</button>

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
