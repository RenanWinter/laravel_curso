@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile</h4>
                            <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nome</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Nome" id="name"
                                            name="name" value="{{ $adminData->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" placeholder="Email" id="email"
                                            name="email" value="{{ $adminData->email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="username" id="username"
                                            name="username" value="{{ $adminData->username }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" placeholder="Profile Image"
                                            id="profile_image" name="profile_image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="image_preview" class="rounded avatar-lg"
                                            src="{{
                                                (!empty($adminData->profile_image))
                                                ? url('upload/admin_images/' . $adminData->profile_image)
                                                : url('upload/no_image.jpg')
                                                }}" alt="Profile image">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Update Profile">
                            </form>
                            <!-- end row -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>


        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#profile_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
