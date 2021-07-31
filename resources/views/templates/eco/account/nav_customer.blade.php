<div class="list-group">
    <a href="{{ sc_route('customer.index') }}" class="list-group-item active">{{ trans('account.acount_details') }}</a>
    <a href="{{ sc_route('customer.change_password') }}" class="list-group-item">{{ trans('account.change_password') }}</a>
    <a href="{{ sc_route('customer.change_infomation') }}" class="list-group-item">{{ trans('account.change_infomation') }}</a>
    <a href="{{ sc_route('customer.address_list') }}" class="list-group-item">{{ trans('account.address_list') }}</a>
    <a href="{{ sc_route('customer.order_list') }}" class="list-group-item">{{ trans('account.order_list') }}</a>
</div>