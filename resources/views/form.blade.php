@extends('layout')
@section('content')
    <main id="main" class="main">
        <div class="page-title">
            <h1 class=""></h1>
            <h2>Create User</h2>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <form id="form" action="{{route('users.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 p-2">
                                        <label for="first_name">First Name</label>
                                        <input type="text"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               id="first_name"
                                               name="first_name"
                                               value="{{ old('first_name') ?? null }}"
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
                                               value="{{ old('last_name') ?? null }}"
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
                                               value="{{ old('email') ?? null }}" required>
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
                                               required>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="house_id">House</label>
                                        <select class="form-select @error('house_id') is-invalid @enderror"
                                                id="house_id"
                                                data-placeholder="Chose A House"
                                                name="house_id" required>
                                            @foreach($houses as $house)
                                                <option
                                                    value="{{$house->id}}">{{$house->address}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="age">Age</label>
                                        <input type="number"
                                               class="form-control @error('age') is-invalid @enderror"
                                               id="age"
                                               name="age"
                                               required>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="date_time">Date Time</label>
                                        <input type="datetime-local"
                                               class="form-control @error('date_time') is-invalid @enderror"
                                               id="date_time"
                                               name="date_time"
                                               required>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="date">Date</label>
                                        <input type="date"
                                               class="form-control @error('date') is-invalid @enderror"
                                               id="date"
                                               name="date"
                                               required>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="time">Time</label>
                                        <input type="time"
                                               class="form-control @error('time') is-invalid @enderror"
                                               id="time"
                                               name="time"
                                               required>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label for="friends-selector">Friends</label>
                                        <select class="form-select" id="friends-selector"
                                                data-placeholder="Choose anything" name="friends[]"
                                                multiple>
                                            @foreach($friends as $friend)
                                                <option value="{{$friend->id}}">{{$friend->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="studying"
                                                   id="status[]" name="status[]">
                                            <label class="form-check-label" for="status[]">
                                                Studying
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="working"
                                                   id="flexCheckChecked" name="status[]" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Working
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                   id="flexRadioDefault1" value="male">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                   id="flexRadioDefault2" value="female" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 p-2">
                                        <label for="file">Image</label>
                                        <input type="file" class="form-control" name="image" id="image"
                                               VALUE="IMAGE">
                                    </div>
                                    <div class="col-md-12 p-2">
                                        <label for="text-editor">Text</label>
                                        <textarea id="text-editor" class="@error('text')is-invalid @enderror"
                                                  name="text" required></textarea>
                                    </div>
                                    @if($errors->has('text'))
                                        <ul class="alert alert-danger list-unstyled">
                                            <li>
                                                {{ $errors->first('text') }}
                                            </li>
                                        </ul>
                                    @endif
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
            initSelect2('#house_id');
            initMultipleSelect2('#friends-selector');
            initTrunbowyg("#text-editor");
        });
    </script>
@endsection
