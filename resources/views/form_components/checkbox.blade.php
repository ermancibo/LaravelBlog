<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">
    {{ Form::label($name, $label_name, ['class' => 'control-label']) }}

    @foreach($elements as $element)
        <label class="checkbox-inline"><input type="checkbox" name="{{$name}}[]" value="{{$element["value"]}}"  {{$element["is_checked"] ? "checked" : null}}>{{$element["text"]}}</label>
    @endforeach

    @if ($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>