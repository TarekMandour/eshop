@if (!empty($details) && count($details))
    @foreach ($details as $groupId => $detailsGroup)

        <div class="option-label">{!! $groups[$groupId]??'Not found' !!}:</div>
        @foreach ($detailsGroup as $k => $detail)
        @php
            $valueOption = $detail->name.' __ '.$detail->add_price;
        @endphp

        <input id="formcheckoutRadio{{$groupId}}{{$k}}" {{ (($k == 0) ? "checked" : "") }} value="{{ $valueOption }}" name="form_attr[{{ $groupId }}]" type="radio" class="radio">
        <label for="formcheckoutRadio{{$groupId}}{{$k}}">{!! sc_render_option_price($valueOption) !!}</label>
                
        @endforeach
        <br><br>
    @endforeach
@endif

