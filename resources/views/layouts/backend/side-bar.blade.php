<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

             {{-- dashboard --}}
            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">

                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>

                          <span class="menu-title">{{ __('admin.dashboard') }}</span>

                    <span class="menu-arrow"></span>
                </span>

                <div class="menu-sub menu-sub-accordion menu-active-bg">


                   @if(auth('admin-company')->check())

                        <div class="menu-item">
                            <a class="menu-link active" href="{{ route('dashboard-company') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __('admin.dashboard') }}</span>
                            </a>
                        </div>
                    @elseif(auth('admin')->check())

                        <div class="menu-item">
                            <a class="menu-link active" href="{{ route('dashboard') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __('admin.dashboard') }}</span>
                            </a>
                        </div>
                   @endif
                </div>


               </div>
               <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Crafted</span>
                </div>
            </div>

            @if(auth('admin-company')->check())

                    {{-- tasks --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-calendar"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ __('admin.tasks') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">


                                    <a class="menu-link active" href="{{ route('tasks.users') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title"> {{ __('admin.tasks')}} </span>
                                    </a>
                                </div>

                        </div>

                    </div>

                     {{-- rates --}}
                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-star"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{__('admin.rates')}}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">


                                    <a class="menu-link active" href="{{ route('rates.user') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title"> {{__('admin.rates')}} </span>
                                    </a>
                                </div>

                        </div>

                    </div>

                    {{-- complaints --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">

                                    <i class="fas fa-comment-alt"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title"> {{ __('admin.complaints')}}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">

                                    <a class="menu-link " href="{{ route('complaints.create') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.add_complaint') }}</span>
                                    </a>


                                    <a class="menu-link active" href="{{ route('complaints.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.complaints')}}</span>
                                    </a>
                                </div>

                        </div>

                    </div>

                     {{-- requirements --}}
                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">

                                    <i class="fas fa-comment-alt"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title"> {{ __('admin.requirements')}}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">

                                    <a class="menu-link " href="{{ route('requirements.create') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.add_requirement') }}</span>
                                    </a>

                                    <a class="menu-link active" href="{{ route('requirements.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.requirements')}}</span>
                                    </a>
                                </div>

                        </div>

                    </div>





            @elseif(auth('admin')->check())


                 {{-- admins  --}}
                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                            <span class="svg-icon svg-icon-2">

                                <i class="fas fa-user"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"> {{ __('admin.admins')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">


                            <div class="menu-item">


                                <a class="menu-link " href="{{ route('admins.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('admin.add_admin') }}</span>
                                </a>

                                <a class="menu-link active" href="{{ route('admins.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('admin.admins')}}</span>
                                </a>
                            </div>

                    </div>

                </div>

                 {{-- companies  --}}
                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                            <span class="svg-icon svg-icon-2">

                                <i class="fas fa-city"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"> {{ __('admin.companies')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">


                            <div class="menu-item">


                                <a class="menu-link " href="{{ route('companies.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('admin.add_company')}}</span>
                                </a>

                                <a class="menu-link active" href="{{ route('companies.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('admin.companies')}}</span>
                                </a>
                            </div>

                    </div>

                 </div>

                  {{-- jobs  --}}
                  <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                            <span class="svg-icon svg-icon-2">

                                <i class="fas fa-briefcase"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">{{ __('admin.sections') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">


                            <div class="menu-item">


                                <a class="menu-link " href="{{ route('sections.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('admin.add_section')}}</span>
                                </a>

                                <a class="menu-link active" href="{{ route('sections.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('admin.sections') }}</span>
                                </a>
                            </div>

                    </div>

                  </div>

                    {{-- users  --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">

                                    <i class="fas fa-user"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title"> {{ __('admin.users') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">


                                    <a class="menu-link " href="{{ route('users.create') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.add_user')}}</span>
                                    </a>

                                    <a class="menu-link active" href="{{ route('users.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.users') }}</span>
                                    </a>
                                </div>

                        </div>

                    </div>

                    {{-- tasks  --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">

                                    <i class="fas fa-calendar"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title"> {{ __('admin.tasks') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">


                                    <a class="menu-link " href="{{ route('tasks.create') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.add_task')}}</span>
                                    </a>

                                    <a class="menu-link active" href="{{ route('tasks.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.tasks') }}</span>
                                    </a>
                                </div>

                        </div>

                    </div>
<!--
                      {{-- rates  --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">

                                    <i class="fas fa-star"></i>
                                </span>
                            </span>
                            <span class="menu-title"> Rates</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">


                                    <a class="menu-link " href="{{ route('rates.create') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Add Rate</span>
                                    </a>

                                    <a class="menu-link active" href="{{ route('rates.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Rates</span>
                                    </a>
                                </div>

                        </div>

                    </div>
                -->

                    {{-- complaints --}}

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">

                                    <i class="fas fa-comment-alt"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ __('admin.complaints') }} </span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">




                                    <a class="menu-link active" href="{{ route('admin.complaints.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.complaints') }}</span>
                                    </a>
                                </div>

                        </div>

                    </div>
                    {{-- requirements --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">

                                    <i class="fas fa-comment-alt"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title"> {{ __('admin.requirements') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">


                                    <a class="menu-link active" href="{{ route('admin.requirement.requirements') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.requirements') }}</span>
                                    </a>
                                </div>

                        </div>

                    </div>

                    {{-- news --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">

                                    <i class="fas fa-calendar"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title"> {{ __('admin.news') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">


                                    <a class="menu-link " href="{{ route('news.create') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.add_news')}}</span>
                                    </a>

                                    <a class="menu-link active" href="{{ route('news.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.news') }}</span>
                                    </a>
                                </div>

                        </div>

                    </div>
                    {{-- news types --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">

                                    <i class="fas fa-calendar"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title"> {{ __('admin.news_types') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">


                                <div class="menu-item">


                                    <a class="menu-link " href="{{ route('news_types.create') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.add_news_type')}}</span>
                                    </a>

                                    <a class="menu-link active" href="{{ route('news_types.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('admin.news_types') }}</span>
                                    </a>
                                </div>

                        </div>

                    </div>
            @endif








        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>
