<div class="form-check">
    <input class="form-check-input" type="radio" name="{{$name}}"
           id="{{$value}}-radio" value="{{$value}}" {{$attributes->merge()}} @checked($checked)>
    <label class="form-check-label" for="flexRadioDefault1">
        {{ucfirst($value)}}
    </label>
</div>
