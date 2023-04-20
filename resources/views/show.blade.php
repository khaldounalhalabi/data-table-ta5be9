@extends('layout')
@section('content')
    <style>
        .image-container {
            position: relative;
            display: inline-block;
            margin: 5px;
            width: 200px; /* adjust the width as needed */
            height: 200px; /* adjust the height as needed */
            overflow: hidden;
        }

        .grid-img-item {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <main id="main" class="main">
        <div class="page-title">
            <h1 class=""></h1>
            <h2>User Details</h2>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active " data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">User Details
                                    </button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-edit">
                                        Edit User Details
                                    </button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">
                                <h5 class="card-title ">User : {{$user->first_name}} {{$user->last_name}}</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">First Name :</div>
                                    <div class="col-lg-9 col-md-8 border border-dark-subtle">{{$user->first_name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">Lat Name :</div>
                                    <div class="col-lg-9 col-md-8 border border-dark-subtle">{{$user->last_name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">Email :</div>
                                    <div class="col-lg-9 col-md-8 border border-dark-subtle">{{$user->email}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">Address :</div>
                                    <div
                                        class="col-lg-9 col-md-8 border border-dark-subtle">{{$userHouse->address}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">Age :</div>
                                    <div
                                        class="col-lg-9 col-md-8 border border-dark-subtle">{{$user->age}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">Date Time :</div>
                                    <div
                                        class="col-lg-9 col-md-8 border border-dark-subtle">{{$user->date_time}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">Date :</div>
                                    <div
                                        class="col-lg-9 col-md-8 border border-dark-subtle">{{$user->date}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">Time :</div>
                                    <div
                                        class="col-lg-9 col-md-8 border border-dark-subtle">{{$user->time}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">Status :</div>
                                    <div
                                        class="col-lg-9 col-md-8 border border-dark-subtle">{{implode(' - ' , json_decode($user->status))}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">Gender :</div>
                                    <div
                                        class="col-lg-9 col-md-8 border border-dark-subtle">{{$user->gender}}</div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 p-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Example
                                            textarea</label>
                                        <textarea class="form-control @error('text') is-invalid @enderror" name="text"
                                                  id="sanitized-text-area" rows="6" readonly>{{$user->text}}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 pt-5 text-center">
                                        <h5>Friends</h5>
                                    </div>
                                    <div class="col-md-12 pt-2 text-justify">
                                        <p class=class="text-justify"
                                           style="text-align: justify; text-justify: distribute;">
                                            @foreach($friends as $friend)
                                                <span>{{$friend->name}}</span>
                                                @if($loop->index != $friends->count()-1)
                                                    <span class="link-primary">||</span>
                                                @endif
                                            @endforeach

                                        </p>
                                    </div>
                                </div>

                                <div class="image-grid p-3 text-center">
                                    <div class="row">
                                        <div class="col-md-12 pt-5 text-center">
                                            <h5>Images</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($files as $file)
                                            <div class="col-md-4">
                                                <div class="image-container">
                                                    <a href="{{asset("storage/$file->path")}}" data-lightbox="gallery">
                                                        <img class="grid-img-item border border-opacity-100 p-3 m-2"
                                                             src="{{asset("storage/$file->path")}}"
                                                             alt="{{$file->name}}" style="border-radius: 50%;">
                                                    </a>
                                                    <button type="button"
                                                            class="btn btn-danger remove-btn remove-image-btn"
                                                            data-deleteurl="{{route('user.image.delete',$file->id)}}"
                                                            data-url="{{ asset($file->path) }}"><i
                                                            class="bi bi-x"></i></button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center p-2">
                                        {{$files->render()}}
                                    </div>
                                </div>

                                <script type="module">
                                    lightbox.option({
                                        'resizeDuration': 200,
                                        'wrapAround': true
                                    })
                                </script>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->
                                    <form method="post" action="{{route('users.update' , $user->id)}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row p-1">
                                            <label for="first_name" class="col-md-3">First Name
                                                : </label>
                                            <div class="col-md-9">
                                                <input name="first_name" type="text"
                                                       class="form-control @error('first_name') is-invalid @enderror"
                                                       id="first_name" value="{{$user->first_name}}">
                                            </div>
                                        </div>
                                        <div class="row p-1">
                                            <label for="last_name" class="col-md-3">Last Name
                                                : </label>
                                            <div class="col-md-9">
                                                <input name="last_name" type="text"
                                                       class="form-control @error('last_name') is-invalid @enderror"
                                                       id="last_name"
                                                       value="{{$user->last_name}}">
                                            </div>
                                        </div>
                                        <div class="row p-1">
                                            <label for="email" class="col-md-3">
                                                Email :
                                            </label>
                                            <div class="col-md-9">
                                                <input name="email" type="text"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       id="email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="col-md-3">
                                                <label for="house_id">House</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="form-select @error('house_id') is-invalid @enderror"
                                                        id="house_id"
                                                        data-placeholder="{{$userHouse->address}}Chose A House"
                                                        name="house_id">
                                                    @foreach($houses as $house)
                                                        <option value="{{$house->id}}">{{$house->address}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="col-md-3">
                                                <label for="multiple-select-clear-field">Friends</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="form-select @error('friends[]') is-invalid @enderror"
                                                        id="multiple-select-clear-field"
                                                        data-placeholder="Choose anything" name="friends[]" multiple>
                                                    @foreach($friends as $friend)
                                                        <option value="{{$friend->id}}">{{$friend->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row p-1">
                                            <div class="col-md-3">
                                                <label for="age" class="col-form-label">Age: </label>
                                            </div>
                                            <div class="col-auto">
                                                <input name="age" type="number"
                                                       class="form-control @error('age') is-invalid @enderror"
                                                       id="age"
                                                       value="{{$user->age}}">
                                            </div>

                                            <div class="col-auto">
                                                <label for="date_time" class="col-form-label">Date Time: </label>
                                            </div>
                                            <div class="col-auto">
                                                <input name="date_time" type="datetime-local"
                                                       class="form-control @error('date_time') is-invalid @enderror"
                                                       id="date_time"
                                                       value="{{$user->date_time}}">
                                            </div>
                                        </div>

                                        <div class="row p-1">
                                            <div class="col-md-3">
                                                <label for="date" class="col-form-label">Date: </label>
                                            </div>
                                            <div class="col-md-3">
                                                <input name="date" type="date"
                                                       class="form-control @error('date') is-invalid @enderror"
                                                       id="date_time"
                                                       value="{{$user->date}}">
                                            </div>
                                            <div class="col-auto">
                                                <label for="time" class="col-form-label">Time: </label>
                                            </div>
                                            <div class="col-md-4">
                                                <input name="time" type="time"
                                                       class="form-control @error('time') is-invalid @enderror"
                                                       id="time"
                                                       value="{{$user->time}}">
                                            </div>
                                        </div>

                                        <div class="row p-1">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="studying"
                                                           id="flexCheckDefault" name="status[]"
                                                           @if(in_array('studying' , json_decode($user->status))) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Studying
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="working"
                                                           id="flexCheckChecked" name="status[]"
                                                           @if(in_array('working' , json_decode($user->status))) checked @endif>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Working
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="flexRadioDefault1"
                                                           value="{{$user->gender == 'male' ? 'female' : 'male'}}">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        {{$user->gender == 'male' ? 'Female' : 'Male'}}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="flexRadioDefault2" value="{{$user->gender}}" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        {{ucfirst($user->gender)}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-1">
                                            <div class="col-md-3">
                                                <label for="file">Image</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" class="form-control" name="image" id="image"
                                                       VALUE="IMAGE">
                                            </div>

                                            <div class="col-md-12 p-2">
                                                <label for="summernote">Text</label>
                                                <textarea id="summernote" name="text" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mt-3">submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script type="module">
        // select2
        $('#house_id').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
        // select2
        $('#multiple-select-clear-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
            allowClear: true,
        });

        // delete image button
        $(document).ready(function () {
            $(".remove-image-btn").on('click', function (e) {
                e.preventDefault();
                let $this = $(this);
                let url = $this.data('deleteurl');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                });
                $.ajax({
                    "method": "DELETE",
                    "url": url,
                    success: function () {
                        $this.parent().remove();
                    }
                });
            });

            //summernote
            $('#summernote').summernote();

            window.onload = function() {
                const textArea = document.getElementById("sanitized-text-area");
                const input = textArea.value;
                 // Remove all HTML tags
                textArea.value = input.replace(/<[^>]+>/g, '');
            };
        });
    </script>
@endsection
