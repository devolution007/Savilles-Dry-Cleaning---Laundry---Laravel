@extends('admin.layouts.master')
{{-- @if(!empty($page)) --}}
{{-- @section('title', 'Edit Area') --}}
{{-- @else --}}
@section('title', 'Create Area')
{{-- @endif --}}
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Areas</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Areas</a></li>
                                <li class="breadcrumb-item active">Create Area</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-8">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Add New Areas
                            </h4>
                        </div><!-- end card header -->

                        <div class="card-body">

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <div class="live-preview">
                                <form method="POST" action="{{ route('admin.areas.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="area" class="form-label">Area:</label>
                                        <input type="text" name="area" id="area" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug:</label>
                                        <input type="text" name="slug" id="slug" class="form-control" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="excerpt" class="form-label">Excerpt:</label>
                                        <textarea name="excerpt" id="excerpt" class="form-control"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="thumbnail" class="form-label">Thumbnail:</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="main_text_body" class="form-label">Main Text Body:</label>
                                        <textarea name="main_text_body" id="main_text_body" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="faq_section" class="form-label">FAQ Section:</label>

                                        <div id="fieldsContainer">
                                            <!-- Existing fields -->
                                            <div class="field mb-3">
                                                <input type="text" name="questions[]" placeholder="Question" class="form-control mb-3">
                                                <textarea name="answers[]" placeholder="FAQ Answer" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <button type="button" id="addFieldButton" class="btn btn-sm btn-secondary">Add More FAQ</button>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->


            </div>
            <!--end row-->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Savilles Dry Cleaners.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection

@push('scripts')

<!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/super-build/ckeditor.js"></script> -->
<script src="{{ asset('public/assets/ckeditor_full/ckeditor.js') }}"></script>

<script>

    try {
        CKEDITOR.replace('main_text_body', {
            language: 'en',
            filebrowserUploadUrl: "{{ route('admin.areas.upload-ckimage', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            alignment: {
                options: ['left', 'right', 'center', 'justify']
            },
            fontSize: {
                options: [10, 12, 14, 16, 18, 20, 24, 28, 32]
            }
        });
    } catch (error) {
        console.error('Error initializing CKEditor:', error);
    }



    // CKEDITOR.create(document.querySelector('#main_text_body'), {
    //     toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'imageUpload', 'undo', 'redo', 'alignment', 'fontSize'],
    //     language: 'en',
    //     ckfinder: {
    //         uploadUrl: '{{ route("admin.pages.upload-image") }}' + '?_token={{ csrf_token() }}',
    //         options: {
    //             resourceType: 'Images'
    //         }
    //     },
    //     alignment: {
    //         options: ['left', 'right', 'center', 'justify']
    //     },
    //     fontSize: {
    //         options: [10, 12, 14, 16, 18, 20, 24, 28, 32]
    //     }
    // })
    // .catch(error => {
    //     console.error(error);
    // });


    $(document).ready(function() {
    // Add event listener to the Add Field button
        $('#addFieldButton').click(function() {
            $('#fieldsContainer').append('<div class="field mb-3"><input type="text" name="questions[]" placeholder="Question" class="form-control mb-3"><textarea name="answers[]" placeholder="FAQ Answer" class="form-control"></textarea><button type="button" class="btn btn-sm btn-danger removeFieldButton mt-2">Remove FAQ</button></div>');
        });

    // Add event listener to dynamically created Remove FAQ buttons
        $(document).on('click', '.removeFieldButton', removeField);
    });

    function removeField() {
        $(this).closest('.field').remove();
    }

    document.addEventListener('DOMContentLoaded', function() {
    // Function to generate slug from area
        function generateSlug(area) {
            return area.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
        }

    // Get references to area and slug input fields
        var areaInput = document.getElementById('area');
        var slugInput = document.getElementById('slug');

    // Event listener for 'input' event on area field
        areaInput.addEventListener('input', function() {
            var areaValue = areaInput.value.trim();
            var slugValue = generateSlug(areaValue);
            slugInput.value = slugValue;
        });
    });


</script>


@endpush