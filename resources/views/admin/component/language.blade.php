@php
    $languages     = sc_language_all();
@endphp

    <!--begin::Languages-->
    <div class="dropdown">
        <!--begin::Toggle-->
        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
            <img class="h-20px w-20px rounded-sm" src="{{ sc_file($languages[session('locale')??app()->getLocale()]['icon']) }}" alt="" />
        </div>
        </div>
        <!--end::Toggle-->
        <!--begin::Dropdown-->
        <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
        <!--begin::Nav-->
        <ul class="navi navi-hover py-4">

            <!--begin::Item-->
            @foreach ($languages as $key=> $language)
            <li class="navi-item active">
            <a href="{{ sc_route_admin('admin.locale', ['code' => $key, 'layout_rtl' => $language['rtl']]) }}" class="navi-link">
                <span class="symbol symbol-20 mr-3">
                <img src="{{ sc_file($language['icon']) }}" style="height: 25px;" alt="{{ $language['name'] }}" />
                </span>
                <span class="navi-text">{{ $language['name'] }}</span>
            </a>
            </li>
            @endforeach 
            <!--end::Item-->

        </ul>
        <!--end::Nav-->
        </div>
        <!--end::Dropdown-->
    </div>
    <!--end::Languages-->