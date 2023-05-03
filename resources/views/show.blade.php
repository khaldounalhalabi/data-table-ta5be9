<x-show.showlayout title="{{$user->first_name .' '.$user->last_name}} Details">

    <x-show.smalltextfield :value="$user->first_name"
                           label="First Name"></x-show.smalltextfield>

    <x-show.smalltextfield :value="$user->last_name"
                           label="Last Name"></x-show.smalltextfield>

    <x-show.smalltextfield :value="$user->email" label="Email"></x-show.smalltextfield>

    <x-show.smalltextfield :value="$userHouse->address"
                           label="Address"></x-show.smalltextfield>

    <x-show.smalltextfield :value="$user->age" label="Age"></x-show.smalltextfield>

    <x-show.smalltextfield :value="$user->date_time"
                           label="Date Time"></x-show.smalltextfield>

    <x-show.smalltextfield :value="$user->date"
                           label="Date"></x-show.smalltextfield>

    <x-show.smalltextfield :value="$user->time"
                           label="Time"></x-show.smalltextfield>

    <x-show.smalltextfield value="{{implode(' - ' , json_decode($user->status))}}"
                           label="Status"></x-show.smalltextfield>

    <x-show.smalltextfield :value="$user->gender"
                           label="Gender"></x-show.smalltextfield>

    <x-show.longtextfield :value="$user->text" label="Text"></x-show.longtextfield>

    <x-show.multiplevaluesfield label="Friends">
        @foreach($friends as $friend)
            <span>{{$friend->name}}</span>
            @if($loop->index != $friends->count()-1)
                <span class="link-primary">||</span>
            @endif
        @endforeach
    </x-show.multiplevaluesfield>

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


</x-show.showlayout>
