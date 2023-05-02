<x-forms.createform formTitle="Create User" action="{{route('users.store')}}">

    <x-forms.validationerrors></x-forms.validationerrors>

    <x-forms.input label="First Name" type="text"></x-forms.input>

    <x-forms.input label="Last Name" type="text"></x-forms.input>

    <x-forms.input label="Email" type="email"></x-forms.input>

    <x-forms.input label="Password" type="password"></x-forms.input>

    <x-forms.select2 label="House">
        @foreach($houses as $house)
            <option
                value="{{$house->id}}">{{$house->address}}</option>
        @endforeach
    </x-forms.select2>

    <x-forms.input label="Age" type="number"></x-forms.input>

    <x-forms.input label="Date Time" type="datetime-local"></x-forms.input>

    <x-forms.input label="Date" type="date"></x-forms.input>

    <x-forms.input label="Time" type="time"></x-forms.input>

    <x-forms.multipleselect2 label="Friends">
        @foreach($friends as $friend)
            <option value="{{$friend->id}}">{{$friend->name}}</option>
        @endforeach
    </x-forms.multipleselect2>

    <x-forms.checkbox.formcheck>

        <x-forms.checkbox.formcheckinput name="status" label="Studying"></x-forms.checkbox.formcheckinput>

        <x-forms.checkbox.formcheckinput name="status" label="Working" checked></x-forms.checkbox.formcheckinput>

    </x-forms.checkbox.formcheck>

    <x-forms.checkbox.formcheck>

        <x-forms.checkbox.formcheckradio name="gender" value="male" checked></x-forms.checkbox.formcheckradio>

        <x-forms.checkbox.formcheckradio name="gender" value="female"></x-forms.checkbox.formcheckradio>

    </x-forms.checkbox.formcheck>

    <x-forms.input label="Image" type="file"></x-forms.input>

    <x-forms.texteditor label="Text"></x-forms.texteditor>

</x-forms.createform>
