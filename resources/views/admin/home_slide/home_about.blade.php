@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home Slide Page</h4>
                            <form method="post" action="{{ route('admin.home.about.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <input type="hidden" name="id" value={{ $data->id }} />
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Title" id="title"
                                            name="title" value="{{ $data->title }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Short Title"
                                            id="short_title" name="short_title" value="{{ $data->short_title }}">
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10">
                                            {{ $data->short_description }}
                                        </textarea>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="long_description">
                                            {{ $data->long_description }}
                                        </textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" placeholder="About Image" id="about_image"
                                            name="about_image">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="image_preview" class="rounded avatar-lg"
                                            src="{{ !empty($data->about_image) ? url($data->about_image) : url('upload/no_image.jpg') }}"
                                            alt="Slide image">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Update About Data">
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
            $('#about_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
