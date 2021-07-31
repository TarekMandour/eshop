@if (!empty($details) && count($details))
    @foreach ($details as $groupId => $detailsGroup)

        <div class="tt-wrapper">
            <div class="tt-title-options">{!! $groups[$groupId]??'Not found' !!}:</div>
            <ul class="list-form-inline">
                
                @foreach ($detailsGroup as $k => $detail)
                @php
                    $valueOption = $detail->name.' __ '.$detail->add_price;
                @endphp

                <li>
                    <label class="radio">
                    <input id="radio" type="radio" name="form_attr[{{ $groupId }}]" value="{{ $valueOption }}" {{ (($k == 0) ? "checked" : "") }}>
                    <span class="outer"><span class="inner"></span></span>{!! sc_render_option_price($valueOption) !!}</label>
                </li>
                        
                @endforeach
                
            </ul>
        </div>

    @endforeach
@endif

