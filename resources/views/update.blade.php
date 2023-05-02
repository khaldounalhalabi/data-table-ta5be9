<x-forms.createform formTitle="Update User" action="{{route('users.update' , $user->id)}}" method="PUT">

    <x-forms.validationerrors></x-forms.validationerrors>
    <x-forms.input label="First Name" :value="$user->first_name" type="text"></x-forms.input>

    <x-forms.input label="Last Name" :value="$user->last_name" type="text"></x-forms.input>

    <x-forms.input label="Email" :value="$user->email" type="email"></x-forms.input>

    <x-forms.input label="Password" :value="$user->password" type="password"></x-forms.input>

    <x-forms.select2 label="House">
        @foreach($houses as $house)
            <option
                value="{{$house->id}}" @selected($userHouse->id == $house->id)>{{$house->address}}</option>
        @endforeach
    </x-forms.select2>

    <x-forms.input label="Age" :value="$user->age" type="number"></x-forms.input>

    <x-forms.input label="Date Time" :value="$user->date_time" type="datetime-local"></x-forms.input>

    <x-forms.input label="Date" :value="$user->date" type="date"></x-forms.input>

    <x-forms.input label="Time" value="{{\Carbon\Carbon::parse($user->time)->format('H:i')}}"
                   type="time"></x-forms.input>

    <x-forms.multipleselect2 label="Friends">
        @foreach($friends as $friend)
            <option value="{{$friend->id}}" @selected($userFriends->contains($friend->id))>{{$friend->name}}</option>
        @endforeach
    </x-forms.multipleselect2>

    <div class="col-md-6 p-2">
        <x-forms.checkbox.formcheckinput checked="{{in_array('studying' ,json_decode( $user->status))}}" name="status"
                                         label="Studying"></x-forms.checkbox.formcheckinput>
        <x-forms.checkbox.formcheckinput checked="{{in_array('working' , json_decode( $user->status))}}" name="status"
                                         label="Working"></x-forms.checkbox.formcheckinput>
    </div>

    <div class="col-md-6 p-2">

        <x-forms.checkbox.formcheckradio name="gender" value="male"
                                         checked="{{$user->gender == 'male'}}"></x-forms.checkbox.formcheckradio>

        <x-forms.checkbox.formcheckradio name="gender" value="female"
                                         checked="{{$user->gender == 'female'}}"></x-forms.checkbox.formcheckradio>

    </div>

    <x-forms.images.gallerywithaddbutton>
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
    </x-forms.images.gallerywithaddbutton>

    <x-forms.texteditor label="Text" :value="$user->text"></x-forms.texteditor>

</x-forms.createform>

