@extends('layout')
@section('content')
    <main id="main" class="main">
        <div class="page-title">
            <h1 class=""></h1>
            <h2>Update User</h2>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <form id="form" action="{{route('users.update' , $user->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 p-2">
                                        <label for="first_name">First Name</label>
                                        <input type="text"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               id="first_name"
                                               name="first_name"
                                               value="{{ old('first_name') ?? $user->first_name ?? null }}"
                                               required>
                                        @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="last_name">Last Name</label>
                                        <input type="text"
                                               class="form-control @error('last_name') is-invalid @enderror"
                                               id="last_name"
                                               name="last_name"
                                               value="{{ old('last_name') ?? $user->last_name ?? null }}"
                                               required>
                                        @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="email">Email</label>
                                        <input type="text"
                                               class="form-control @error('email') is-invalid @enderror"
                                               id="email"
                                               name="email"
                                               value="{{ old('email') ?? $user->email ?? null }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="password">Password</label>
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               id="password"
                                               name="password"
                                               value="{{$user->password}}"
                                        >
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="house_id">House</label>
                                        <select class="form-select @error('house_id') is-invalid @enderror"
                                                id="house_id"
                                                data-placeholder="Chose an address"
                                                name="house_id">
                                            @foreach($houses as $house)
                                                <option
                                                    value="{{$house->id}}"
                                                    @if($house->id == $userHouse->id) selected @endif>{{$house->address}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="age">Age</label>
                                        <input type="number"
                                               class="form-control @error('age') is-invalid @enderror"
                                               id="age"
                                               name="age"
                                               value="{{$user->age}}"
                                        >
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="date_time">Date Time</label>
                                        <input type="datetime-local"
                                               class="form-control @error('date_time') is-invalid @enderror"
                                               id="date_time"
                                               name="date_time"
                                               value="{{$user->date_time}}"
                                        >
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="date">Date</label>
                                        <input type="date"
                                               class="form-control @error('date') is-invalid @enderror"
                                               id="date"
                                               name="date"
                                               value="{{$user->date}}"
                                        >
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="time">Time</label>
                                        <input type="time"
                                               class="form-control @error('time') is-invalid @enderror"
                                               id="time"
                                               name="time"
                                               value="{{\Carbon\Carbon::parse($user->time)->format('H:i')}}"
                                        >
                                    </div>
                                    <div class="col-md-12 p-2">
                                        <label for="friends-selector">Friends</label>
                                        <select class="form-select" id="friends-selector"
                                                data-placeholder="Choose anything" name="friends[]"
                                                multiple>
                                            @foreach($friends as $friend)
                                                <option value="{{$friend->id}}"
                                                        @if($userFriends->pluck('id')->contains($friend->id))
                                                            selected="selected"
                                                    @endif
                                                >
                                                    {{$friend->name}}
                                                </option>
                                            @endforeach
                                        </select>
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
                                    <div class="p-2">
                                        <div class="gallery">
                                            @foreach($files as $file)
                                                <div class="image-container">
                                                    <a href="{{asset("storage/$file->path")}}"
                                                       data-caption="Image caption">
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
                                            <div class="image-container" hidden>
                                                <a id="imageThumb"
                                                   data-caption="Image caption">
                                                    <img alt="First image" id="imagePreview"
                                                         class="grid-img-item p-3 m-2" src="">
                                                </a>
                                                <button id="remove-button-for-temp" type="button" hidden
                                                        class="btn btn-danger remove-btn remove-image-btn"
                                                        data-deleteurl="#"
                                                        data-url=""><i
                                                        class="bi bi-x"></i>
                                                </button>
                                            </div>
                                            <div class="image-container">
                                                <label for="imageUpload"
                                                       class="grid-img-item p-3 m-2 btn upload-file-button-label">
                                                    <i class="bi bi-plus-circle link-primary upload-file-button-icon"></i>
                                                </label>
                                                <input id="imageUpload" type="file" name="image" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 p-2">
                                        <label for="text-editor">Text</label>
                                        @if($errors->has('text'))
                                            <ul class="alert alert-danger list-unstyled">
                                                <li>
                                                    {{ $errors->first('text') }}
                                                </li>
                                            </ul>
                                        @endif
                                        <textarea id="text-editor"
                                                  name="text" rows="6" required>{{$user->text}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button id="submit-btn" type="submit" class="btn btn-primary btn-lg btn-block">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script type="module">
        $(document).ready(function () {
            initBaguetteBox('.gallery');
            initTrunbowyg("#text-editor");
            initSelect2("#house_id");
            initMultipleSelect2("#friends-selector");
            handleImageDeleteButton(".remove-image-btn");
            handleAddImageButton(
                "#imageUpload",
                '#imagePreview',
                '#imageThumb',
                '#remove-button-for-temp',
            );
        });
    </script>
@endsection
