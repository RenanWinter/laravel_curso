@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password Page</h4>
                            <br><br>

                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form method="post" action="{{ route('admin.profile.password.update') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Old password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="Old Password"
                                            id="oldpassword" name="oldpassword" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="New Password"
                                            id="newpassword" name="newpassword" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="Confirm Password"
                                            id="confirm_password" name="confirm_password" value="">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Change Password">
                            </form>
                            <!-- end row -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>


        </div>
    </div>
@endsection
