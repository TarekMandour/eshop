@if(Session::has('message') || Session::has('status') || Session::has('success') || Session::has('error') || Session::has('warning'))

<div class="holder">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18 col-lg-8">
                @if(Session::has('message') || Session::has('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {!! Session::get('message') !!}
                    {!! Session::get('status') !!}
                </div>
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {!! Session::get('success') !!}
                </div>
                @endif

                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {!! Session::get('error') !!}
                </div>
                @endif

                @if(Session::has('warning'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {!! Session::get('warning') !!}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif