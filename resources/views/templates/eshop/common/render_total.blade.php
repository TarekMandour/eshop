@if (!empty($dataTotal) && count($dataTotal))
<table class="tt-shopcart-table01" id="showTotal">
    @foreach ($dataTotal as $key => $element)
        @if ($element['code']=='total')
        <tfoot class="showTotal">
            <tr>
                <th>{!! $element['title'] !!}</th>
                <td id="{{ $element['code'] }}">{{$element['text'] }}</td>
            </tr>
        </tfoot>
        @elseif($element['value'] !=0)
        <tbody class="showTotal">
            <tr>
                <th>{!! $element['title'] !!}</th>
                <td id="{{ $element['code'] }}">{{$element['text'] }}</td>
            </tr>
        </tbody>
        @endif
    @endforeach
</table>
@endif
