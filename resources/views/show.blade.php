@extends('layout')
@section('content')
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
                            <div class="tab-content p-2">
                                <div class="pb-3">
                                    <h5 class="card-title d-inline">User
                                        : {{$user->first_name}} {{$user->last_name}}</h5>
                                    <a href="{{route('users.edit' , $user->id)}}" class="p-2">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </div>

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
                                    <div class="mb-3 p-3 col-lg-12 col-md-12">
                                        <label for="text-area" class="form-label">Example
                                            textarea</label>
                                        <div id="text-area" class="border border-secondary text-center">
                                            {!! $user->text !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-2">
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
                                <div class="p-2">
                                    <div class="gallery">
                                        @foreach($files as $file)
                                            <div class="image-container">
                                                <a href="{{asset("storage/$file->path")}}" data-caption="Image caption">
                                                    <img src="{{asset("storage/$file->path")}}" alt="First image"
                                                         class="grid-img-item p-3 m-2">
                                                </a>
                                                <button type="button"
                                                        class="btn btn-danger remove-btn remove-image-btn"
                                                        data-deleteurl="{{route('user.image.delete',$file->id)}}"
                                                        data-url="{{ asset($file->path) }}"><i
                                                        class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script type="module">
        $(document).ready(function () {
            initBaguetteBox(".gallery");
            initSelect2("#house_id");
            initMultipleSelect2('#multiple-select-clear-field')
            handleImageDeleteButton(".remove-image-btn");
        });
    </script>
@endsection
