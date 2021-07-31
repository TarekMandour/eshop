@if (sc_store('active') == '1'  || (sc_store('active') == '0' && auth()->guard('admin')->user()))
        {{-- Admin logged can view the website content under maintenance --}}
    @if (sc_store('active') == '0' && auth()->guard('admin')->user())
        @include($sc_templatePath . '.maintenance_note')
    @endif
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="{{ $description??sc_store('description') }}">
    <meta name="keyword" content="{{ $keyword??sc_store('keyword') }}">
    <meta name="author" content="Tarek Mandour">

    <title>{{$title??sc_store('title')}}</title>
    <link rel="icon" href="{{ sc_file(sc_store('icon', null, 'images/icon.png')) }}" type="image/png" sizes="16x16">
    <meta property="og:image" content="{{ !empty($og_image)?sc_file($og_image):sc_file('images/org.jpg') }}" />
    <meta property="og:url" content="{{ \Request::fullUrl() }}" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="{{ $title??sc_store('title') }}" />
    <meta property="og:description" content="{{ $description??sc_store('description') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- css default for item -->
    @include($sc_templatePath.'.common.css')
    <!--//end css defaut -->

    <!--Module meta -->
    @isset ($sc_blocksContent['meta'])
    @foreach ( $sc_blocksContent['meta'] as $layout)
    @php
    $arrPage = explode(',', $layout->page)
    @endphp
    @if ($layout->page == '*' || (isset($layout_page) && in_array($layout_page, $arrPage)))
    @if ($layout->type =='html')
    {!! $layout->text !!}
    @endif
    @endif
    @endforeach
    @endisset
    <!--//Module meta -->

    <link href="{{ sc_file($sc_templateFile.'/css/vendor/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ sc_file($sc_templateFile.'/css/vendor/vendor.min.css')}}" rel="stylesheet">
    <link href="{{ sc_file($sc_templateFile.'/css/style.css')}}" rel="stylesheet">
    <link href="{{ sc_file($sc_templateFile.'/fonts/icomoon/icons.css')}}" rel="stylesheet">
    @if (session('layout') == 1)
    <link href="{{ sc_file($sc_templateFile.'/css/style-rtl.css')}}" rel="stylesheet">
    @endif
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <style>
        {!! sc_store_css() !!}
    </style>

    @stack('styles')
</head>

<body class="template-collection has-smround-btns has-loader-bg equal-height has-sm-container" dir="{{session('layout')}}">
    
    {{-- Block header --}}
    @section('block_header')
    @include($sc_templatePath.'.block_header')
    @show
    {{--// Block header --}}

    {{-- Block top --}}
    @section('block_top')
    @include($sc_templatePath.'.block_top')
    @show
    {{-- //Block top --}}
    
    <div class="page-content">
        
        {{-- Block main --}}
        @section('block_main')
            @section('block_main_content')
            @include($sc_templatePath.'.block_main_content_left')
            @include($sc_templatePath.'.block_main_content_center')
            @include($sc_templatePath.'.block_main_content_right')
            @show
        @show

        @yield('news')

        {{-- Block bottom --}}
        @section('block_bottom')
        @include($sc_templatePath.'.block_bottom')
        @show
        {{-- //Block bottom --}}

    </div>

    {{-- Block footer --}}
    @section('block_footer')
    @include($sc_templatePath.'.block_footer')
    @show
    {{-- //Block footer --}}

    <div id="sc-loading">
        <div class="sc-overlay"><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
    </div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60d5ff5e65b7290ac637ed4b/1f91ur2m7';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
                                        
    <script src="{{ sc_file($sc_templateFile.'/js/vendor-special/lazysizes.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/vendor-special/ls.bgset.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/vendor-special/ls.aspectratio.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/vendor-special/jquery.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/vendor-special/jquery.ez-plus.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/vendor/vendor.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/app-html.js')}}"></script>

    <!-- js default for item -->
    @include($sc_templatePath.'.common.js')
    <!--//end js defaut -->
    @stack('scripts')
</body>

</html>

@else
    @include($sc_templatePath . '.maintenance')
@endif