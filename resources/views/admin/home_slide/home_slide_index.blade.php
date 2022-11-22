
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
                            <form method="post" action="{{ route('home.slide.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <input type="hidden" name="id" value={{$homeSlide->id}} />
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Title" id="title"
                                            name="title" value="{{ $homeSlide->title }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Short Title" id="short_title"
                                            name="short_title" value="{{ $homeSlide->short_title }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Video URL" id="video_url"
                                            name="video_url" value="{{ $homeSlide->video_url }}">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Slide Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" placeholder="Slide Image"
                                            id="home_slide" name="home_slide">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="image_preview" class="rounded avatar-lg"
                                            src="{{
                                                (!empty($homeSlide->home_slide))
                                                ? url($homeSlide->home_slide)
                                                : url('upload/no_image.jpg')
                                                }}" alt="Slide image">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Update Slide">
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
            $('#home_slide').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
