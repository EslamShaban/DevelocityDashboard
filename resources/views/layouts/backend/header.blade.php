@php
    if(auth('admin')->check()){
    
        $task_notifications = auth('admin')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\TaskStatus')
                                ->orderBy('created_at','DESC')->limit(50)->get();
        $req_notifications  = auth('admin')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\AddRequirement')
                                ->orderBy('created_at','DESC')->limit(50)->get();

    }else{
        
        $task_notifications = auth('admin-company')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\AddTask')
                                ->orderBy('created_at','DESC')->limit(50)->get();
        $req_notifications  = auth('admin-company')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\ChangStatusRequirement')
                                ->orderBy('created_at','DESC')->limit(50)->get();

    }

@endphp
<div id="kt_header" style="" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Aside mobile toggle-->

        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="#" class="d-lg-none">
                <img alt="Logo" src="https://develocity.finance/images/logo-shape.svg" class="h-30px" />
            </a>

            <div class="btn-group mb-5">


                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <button type="button" class="btn btn-light btn-sm"  aria-haspopup="true" aria-expanded="false">
                        @if (App::getLocale() == 'en')
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @else
                            <a  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @endif
                    </button>
                @endforeach
            </div>






        </div>
        <!--end::Mobile logo-->

        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->





            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch flex-shrink-0">

                 <!--begin::Notifications-->
                 <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <!--begin::Menu- wrapper-->
                    <div class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="black" />
                                <path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="black" />
                                <path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="black" />
                                <path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
                        <!--begin::Heading-->
                        <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ asset('assets/media/misc/pattern-1.jpg') }}')">
                            <!--begin::Title-->
                            <h3 class="text-white fw-bold px-9 mt-10 mb-6">{{ __('admin.notifications') }}
                            <span class="fs-8 opacity-75 ps-3"> {{ __('admin.num_unread_notif') }} :
                                 @if (auth('admin')->check())
                                 {{ auth('admin')->user()->unreadNotifications->count() }}
                                 @else
                                 {{ auth('admin-company')->user()->unreadNotifications->count() }}
                                 @endif
                            </span></h3>
                            <div class="d-flex">
                                <span class="badge badge-pill badge-warning mr-auto my-auto float-left"><a
                                        href="{{ route('MarkAsRead_all') }}"> {{ __('admin.set_read_all') }} </a></span>
                            </div>


                            <!--end::Title-->
                            <!--begin::Tabs-->
                            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
                                <li class="nav-item">
                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_1">{{ __('admin.tasks') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_2"> {{ __('admin.requirements') }} </a>
                                </li>

                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab panel-->
                            <div class="tab-pane show active" id="kt_topbar_notifications_1" role="tabpanel">
                                                            
                                <x-notifications :tasknotifications="$task_notifications" :reqnotifications="null"/>

                            </div>
                            <div class="tab-pane fade" id="kt_topbar_notifications_2" role="tabpanel">
                                <x-notifications :tasknotifications="null" :reqnotifications="$req_notifications"/>
                            </div>


                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Notifications-->

                <!--begin::User menu-->
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        @if(auth('admin')->check())
                            <img src="{{auth('admin')->user()->img ? asset('Attachments/admins/'.auth('admin')->user()->img) :asset('Attachments/admins/1.png')}}" alt="user" />
                        @else
                            <img src="{{auth('admin-company')->user()->img ? asset('Attachments/users/'.auth('admin-company')->user()->img) :asset('Attachments/admins/1.png')}}" alt="user" />
                        @endif
                    </div>

                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    @if(auth('admin')->check())
                                        <img src="{{auth('admin')->user()->img ? asset('Attachments/admins/'.auth('admin')->user()->img) :asset('Attachments/admins/1.png')}}" alt="user" />
                                    @else
                                        <img src="{{auth('admin-company')->user()->img ? asset('Attachments/users/'.auth('admin-company')->user()->img) :asset('Attachments/admins/1.png')}}" alt="user" />
                                    @endif
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                        @if(auth('admin')->check())
                                           {{ auth('admin')->user()->admin_name }}
                                        @elseif(auth('admin-company')->check())
                                         {{ auth('admin-company')->user()->name }}
                                        @endif
                                    <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">

                                    </span></div>
                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">
                                        @if(auth('admin')->check())
                                        {{ auth('admin')->user()->email }}
                                     @elseif(auth('admin-company')->check())
                                     {{ auth('admin-company')->user()->email }}
                                     @endif
                                    </a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>


                        <div class="menu-item px-5">
                            @if(auth('admin')->check())
                            <a class="dropdown-item" href="{{ route('logout-admin') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>{{ __('admin.signout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                         @elseif(auth('admin-company')->check())

                         <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('admin.edit_profile') }}
                         </a>
                        <a class="dropdown-item" href="{{ route('logout-admin-company') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>{{ __('admin.signout') }}
                         </a>
                         <form id="logout-form" action="{{ route('logout-admin-company') }}" method="POST" style="display: none;">
                         @csrf
                         </form>

                         @endif


                            {{-- <a href="../../demo1/dist/authentication/flows/basic/sign-in.html" class="menu-link px-5">Sign Out</a> --}}
                        </div>

                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
                <!--begin::Header menu toggle-->
                <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                    <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="black" />
                                <path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Header menu toggle-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
