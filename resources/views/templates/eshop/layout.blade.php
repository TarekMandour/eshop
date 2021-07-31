@if (sc_store('active') == '1'  || (sc_store('active') == '0' && auth()->guard('admin')->user()))
        {{-- Admin logged can view the website content under maintenance --}}
    @if (sc_store('active') == '0' && auth()->guard('admin')->user())
        @include($sc_templatePath . '.maintenance_note')
    @endif

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<title>{{$title??sc_store('title')}}</title>
	<meta name="description" content="{{ $description??sc_store('description') }}">
    <meta name="keyword" content="{{ $keyword??sc_store('keyword') }}">
    <meta name="author" content="Tarek Mandour">

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

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ sc_file($sc_templateFile.'/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/theme.css')}}">
    
    @if (session('layout') == 1)
    <link href="{{ sc_file($sc_templateFile.'/css/rtl.css')}}" rel="stylesheet">
    @endif

    <style>
        {!! sc_store_css() !!}
    </style>

    @stack('styles')

</head>


<body>
    <div id="loader-wrapper">
        <div id="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    
    {{-- Block header --}}
    @section('block_header')
    @include($sc_templatePath.'.block_header')
    @show
    {{--// Block header --}}

    
    
    <div id="tt-pageContent">
        {{-- Block top --}}
        @section('block_top')
        @include($sc_templatePath.'.block_top')
        @show
        {{-- //Block top --}}

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

        {{-- Block footer --}}
        @section('block_footer')
        @include($sc_templatePath.'.block_footer')
        @show
        {{-- //Block footer --}}

    </div>

    

    <script src="{{ sc_file($sc_templateFile.'/external/jquery/jquery.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/elevatezoom/jquery.elevatezoom.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/slick/slick.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/panelmenu/panelmenu.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/instafeed/instafeed.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/countdown/jquery.plugin.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/isotope/imagesloaded.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/air-sticky/air-sticky-block.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/lazyLoad/lazyload.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/main.js')}}"></script>
    <!-- form validation and sending to mail -->
    <script src="{{ sc_file($sc_templateFile.'/external/form/jquery.form.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/form/jquery.validate.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/external/form/jquery.form-init.js')}}"></script>

    <!-- js default for item -->
    @include($sc_templatePath.'.common.js')
    <!--//end js defaut -->
    @stack('scripts')

</body>
</html>

@else
    @include($sc_templatePath . '.maintenance')
@endif