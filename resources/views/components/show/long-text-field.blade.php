<div class="row">
    <div class="mb-3 p-3 col-lg-12 col-md-12">
        <div class="form-group">
            <label for="{{\Illuminate\Support\Str::snake($label)}}-textarea">{{$label}}</label>
            <textarea class="form-control" id="{{\Illuminate\Support\Str::snake($label)}}-textarea"
                      rows="3" readonly {{$attributes->merge()}}>{{$value}}</textarea>
            <script type="module">
                let textareaElement = $('#{{\Illuminate\Support\Str::snake($label)}}-textarea');
                let textareaContent = textareaElement.val();
                let strippedContent = $('<div>').html(textareaContent).text();
                textareaElement.val(strippedContent);
            </script>
        </div>
    </div>
</div>
