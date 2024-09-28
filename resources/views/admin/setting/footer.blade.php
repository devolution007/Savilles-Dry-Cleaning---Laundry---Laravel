@extends('admin.layouts.master')
@if (!empty($user))
    @section('title', 'Edit User')
@else
    @section('title', 'Create User')
@endif
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Footer</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                                    <li class="breadcrumb-item active">{{ !empty($setting) ? 'Edit' : 'Create' }} Footer
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">
                                    Edit Footer
                                </h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="{{ route('admin.setting.footer_update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Site Logo</label>
                                                    {{-- <input type="text" class="form-control" placeholder="Enter your title" name="sub_cat_name" value="{{ !empty($service) ? $service->sub_cat_name : old('title') }}" required> --}}
                                                    <input type="file" class="form-control"
                                                        placeholder="Choose your file" name="logo" id="fileChooser"
                                                        onchange="return ValidateFileUpload()">
                                                        <span id="errorMessage" style="color: red;"></span>
                                                       <br> <img id="blah" src="#" alt="">
                                                    <input type="hidden" class="form-control"
                                                        placeholder="Choose your file" name="oldLogo"
                                                        value="{{ $setting->logo }}">
                                                    <img src="{{ asset('public/assets/images/logo/' . $setting->logo) }}"
                                                        alt="Current Logo" id="logoPreview"
                                                        style="max-width: 100%; max-height: 150px; margin-top: 10px;">
                                                    @error('title')
                                                        <div class="text text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Mobile Number</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your mobile" name="mobile_number"
                                                        value="{{ !empty($setting) ? $setting->mobile_number : old('title') }}"
                                                        required>
                                                    @error('title')
                                                        <div class="text text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Discription</label>
                                                    {{-- <input type="text" class="form-control" placeholder="Enter your title" name="url" value="{{ !empty($service) ? $service->url : old('title') }}" required> --}}
                                                    <textarea class="form-control" placeholder="Enter your title" name="discription" required>{{ !empty($setting) ? $setting->footer_info : old('footer_info') }}</textarea>

                                                    @error('title')
                                                        <div class="text text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" id="btn_save"
                                                        class="btn btn-primary">{{ !empty($service) ? 'Update' : 'Save' }}</button>
                                                    <a href="{{ route('admin.setting.social') }}" class="btn btn-primary mx-4 float-right" style="float: right;" data-key="t-chat"> Add Social Link </a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div> <!-- end col -->


                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">
                                 Social Icone List
                                </h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th data-ordering="false">SR No.</th>
                                            <th class="min-w-125px">Icone</th>
                                            <th class="min-w-125px">Social Url</th>
                                        
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1 @endphp
                                        @foreach($social as $socials)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td> <img src="{{ asset('public/assets/images/logo/' . $socials->logo) }}"
                                                alt="Current Logo" id="logoPreview"
                                                style="max-width: 100%; max-height: 60px; margin-top: 1px;"></td>
                                            <td>{{ $socials->url }}</td>
                                           
                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <abbr class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><button class="dropdown-item edit-item-btn edit" data-url="{{ route('admin.setting.edit_social_icone',$socials->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
                                                            <li>
                                                                <a class="dropdown-item remove-item-btn delete" data-id="{{ $socials->id }}" data-url="{{ url('admin/setting/delete-social-icone/'.$socials->id) }}">
                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                </a>
                                                            </li>
                                                        </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                        </div>
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
    {{-- <script>
        document.getElementById('logoInput').addEventListener('change', function(event) {
            var input = event.target;
            var preview = document.getElementById('logoPreview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '{{ asset('public/images/' . $setting->logo) }}';
                preview.style.display = '{{ $setting->logo ? 'block' : 'none' }}';
            }
        });
    </script> --}}


@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

    $(document).ready(function() {
        $(document).on('click', '.delete', function() {
           
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to delete this record?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = $(this).data('url');
                    var id = $(this).data('id');
                    $.ajax({
                        url: url,
                        method: 'get',
                       
                        success: function(data) {
                            if (data.success) {
                                toastr.success(data.message);
                                location.reload();
                            } else {
                                toastr.error(data.message);
                            }
                        },
                    });
                }
            }
            )
        });
        $(document).on('click', '.edit', function() {
           
            window.location.href = $(this).data('url');
        });
    })
</script>
<SCRIPT type="text/javascript">
    function ValidateFileUpload() {
        var fuData = document.getElementById('fileChooser');
        var errorMessage = document.getElementById('errorMessage');
        var FileUploadPath = fuData.value;

        // To check if the user uploaded any file
        if (FileUploadPath == '') {
            errorMessage.innerHTML = "Please upload an image";
        } else {
            var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

            // The file uploaded is an image
            if (Extension == "gif" || Extension == "png" || Extension == "svg") {

                // To display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

                // Reset error message if it was previously set
                errorMessage.innerHTML = "";
                btn_save.disabled = false;
            } else {
                errorMessage.innerHTML = "Photo only allows file types of GIF, PNG, JPG, JPEG, and BMP.";
              btn_save.disabled = true;
            }
        }
    }
</SCRIPT>
@endpush
