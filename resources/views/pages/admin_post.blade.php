@extends('layouts.auth')

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

<style>
    body {
        background: url(img/bg11.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    .card2 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 80%;
    }

    .card2:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .cont {
        color: white;
        padding: 20px 20px;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .button {
        border: none;
        background-color: black;
        color: white;
        text-align: center;
        text-decoration: none;
        font-weight: 400;
        display: inline-block;
        margin: 0px 2px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 4px 32px;
    }

    .btn1 {
        font-size: 18px;
    }

    .btn2 {
        font-size: 16px;
    }

    .button:hover {
        background-color: grey;
        text-decoration: none;
        color: black;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

            <button type="button" class="button btn1" data-toggle="modal" data-target="#myModal">
                <i class='fas fa-plus-circle' style="padding:5px; font-size:18px; color: white;"></i>
                Create a New Post
            </button>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: black; text-align: center; color: white;">

                            <h4 class="modal-title">Create a New Post</h4>
                        </div>
                        <div class="modal-body" style="color: grey">

                            <form action="/createPost" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Choose an image :</strong>
                                            <input type="file" class="form-control-file" name="image" id="exampleInputFile" aria-describedby="fileHelp">
                                            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Title :</strong>
                                            <input type="text" name="title" class="form-control" placeholder="Title of your Post">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Point 1 :</strong>
                                            <textarea class="form-control" style="height:50px" name="point1" placeholder="Write a point about the post"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>point 2 :</strong>
                                            <textarea class="form-control" style="height:50px" name="point2" placeholder="Write a point about the post"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Point 3 :</strong>
                                            <textarea class="form-control" style="height:50px" name="point3" placeholder="Write a point about the post"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Point 4 :</strong>
                                            <textarea class="form-control" style="height:50px" name="point4" placeholder="Write a point about the post"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="button btn2">
                                            Submit
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-8" style="margin:20px 0px;">

            <table class="table table-hover" style="color:white;">
                <thead>
                    <tr>
                        <th>
                            Posts
                        </th>
                        <th>
                            Options
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($posts) == 0)
                    <tr>
                        <td>
                            <strong>Nothing has been posted yet!</strong>
                        </td>
                    </tr>
                    @else

                    @foreach ($posts as $post)
                    <tr>
                        <td>
                            <div class="card2">
                                <img src="storage/post_images/{{ $post->image }}" alt="Posts For You..." width=100% />
                                <div class="cont">
                                    <h4><b><a style="color: #009999;">{{$post->title}}</a></b></h4>
                                    @if(!empty($post->point1))
                                    <p>
                                        <i class='fas fa-angle-right'></i>
                                        <a style="color: #999900;">{{$post->point1}}</a>
                                    </p>
                                    @endif
                                    @if(!empty($post->point2))
                                    <p>
                                        <i class='fas fa-angle-right'></i>
                                        <a style="color: #00CCCC;">{{$post->point2}}</a>
                                    </p>
                                    @endif
                                    @if(!empty($post->point3))
                                    <p>
                                        <i class='fas fa-angle-right'></i>
                                        <a style="color: #999900;">{{$post->point3}}</a>
                                    </p>
                                    @endif
                                    @if(!empty($post->point4))
                                    <p>
                                        <i class='fas fa-angle-right'></i>
                                        <a style="color: #00CCCC;">{{$post->point4}}</a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <td>
                            <div type="submit" class="button btn2" onclick="location.href='removePost/{{$post->id}}'" method="GET">Remove this Post</div>
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection