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
                            <h4 class="mb-sm-0">Social link</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                                    <li class="breadcrumb-item active">{{ !empty($setting) ? 'Edit' : 'Create' }} Social
                                        Link
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <!-- end col -->


                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">
                                    @if (!empty($setting))
                                        Edit
                                    @else
                                        Add
                                    @endif Social Icone
                                </h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="live-preview">
                                    <form
                                        action="@if (!empty($setting)) {{ route('admin.setting.footer_create_social') }} @else {{ route('admin.setting.footer_update_social') }} @endif"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($setting))
                                            <input type="hidden" name="id" value="{{ $setting->id }}">
                                        @endif
                                        <div class="row">
                                            <div class="col-md-12">
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
                                                        @if (isset($setting->logo)) value="{{ $setting->logo }}" @endif>
                                                    @if (isset($setting->logo))
                                                        <img src="{{ asset('public/assets/images/logo/' . $setting->logo) }}"
                                                            alt="Current Logo" id="logoPreview"
                                                            style="max-width: 100%; max-height: 150px; margin-top: 10px;">
                                                    @endif
                                                    @error('title')
                                                        <div class="text text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Icone Url</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your title" name="url"
                                                        value="{{ !empty($setting) ? $setting->url : old('title') }}"
                                                        required>


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
                                                    <a href="{{ route('admin.setting.footer') }}"
                                                        class="btn btn-primary mx-4 float-right" style="float: right;"
                                                        data-key="t-chat"> Back </a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>


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
    @if (isset($setting->logo))
        <script>
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
        </script>
    @endif

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
@endsection
