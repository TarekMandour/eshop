@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="holder mt-0">
    <div class="container">
        <div class="page404-bg">
          <div class="page404-text">

                <div class="txt2 mb-5">{{ trans('account.verify_email.title_header') }}</div>
                
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ trans('account.verify_email.msg_sent') }}
                    </div>
                @endif
              

              <div class="txt4">{{ trans('account.verify_email.msg_page_1') }}</div>
                <form class="d-inline" method="POST" action="">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ trans('account.verify_email.msg_page_2') }}</button>
                </form>
              <div class="txt2">{{ trans('order.success.order_info',['order_id'=>session('orderID')]) }}</div>
            </div>
        </div>
    </div>
  </div>

@endsection
