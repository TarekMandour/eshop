
<div class="tt-wrapper">
<ul class="tt-list-dash">
    <li>
        <a href="{{ sc_route('customer.index') }}" class="list-group-item active">{{ trans('account.acount_details') }}</a>
    </li>
    <li>
        <a href="{{ sc_route('customer.change_password') }}" class="list-group-item">{{ trans('account.change_password') }}</a>
    </li>
    <li>
        <a href="{{ sc_route('customer.change_infomation') }}" class="list-group-item">{{ trans('account.change_infomation') }}</a>
    </li>
    <li>
        <a href="{{ sc_route('customer.address_list') }}" class="list-group-item">{{ trans('account.address_list') }}</a>
    </li>
    <li>
        <a href="{{ sc_route('customer.order_list') }}" class="list-group-item">{{ trans('account.order_list') }}</a>
    </li>
</ul>
</div>