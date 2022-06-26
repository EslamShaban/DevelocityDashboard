

@extends('layouts.master')

@section('title')
  {{ trans('side-bar.dashboard') }}
@endsection

@section('style')

@endsection

@section('content')

  @if(auth('admin-company')->check())

    @if(isset($latest_new) && $latest_new != '')
        <section class="latest_news">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="sec_title">
                            <h2>أخر الأخبار
                                <a href="{{ route('users.news.index')}}" style="float: left;">المزيد من الاخبار</a>
                            </h2>
                        </div>
                    </div>
                    <div class="news">
                        <div class="col-12">
                            <div class="row news-data">
                                <div class="col-md-6 news_image">
                                    <div class="image">
                                        <img src="{{ asset('Attachments/news/'. $latest_new->img) }}" width="100%" height="100%">
                                    </div>
                                </div>
                                <div class="col-md-6 grid_news_content">
                                    <div class="news_content">
                                        <div class="news_title">
                                            <a href="{{ route('users.news.show', $latest_new->id) }}">
                                                <h2>
                                                    {{ $latest_new->title }}
                                                    <p style="float: left; color:#8b7d7d;font-size:14px; margin:10px">{{ $latest_new->created_at->diffForHumans()}}</p>

                                                </h2>
                                            </a>
                                        </div>
                                        <div class="news_desc">
                                            <p>{!! Str::limit(strip_tags($latest_new->desc), $limit = 350, $end = '...') !!}</p>
                                            <a href="{{ route('users.news.show', $latest_new->id) }}" class="read-more-button" style="float: left;margin-left: 10px;color: #e95a5a;"><i class="fa fa-arrow-circle-left" style="color: #e95a5a; margin-left:5px"></i>إقرا المزيد</a>
                                        </div>
                                                                            
                                        <span>{{ $latest_new->type->title }}</span>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

  <div class="card-body">
         {{-- tasks --}}
       <div class="row g-3 g-xl-3">
           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('tasks.users') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">

                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.tasks') }}</div>
                       <div class="fw-bold text-white"> {{ $tasks }} </div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('tasks.users') }}" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.waiting_tasks') }} </div>
                       <div class="fw-bold text-white">{{ $task_waiting }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('tasks.users') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.completed_tasks') }} </div>
                       <div class="fw-bold text-white">{{ $tasks_complete }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

       </div>

          {{-- requirements --}}
       <div class="row g-3 g-xl-3">
           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('requirements.index') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">

                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.waiting_requirements') }}</div>
                       <div class="fw-bold text-white"> {{ $requirement_waiting }} </div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('requirements.index') }}" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.rejected_requirements') }} </div>
                       <div class="fw-bold text-white">{{ $requirement_rejected }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('requirements.index') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.approved_requirements') }}</div>
                       <div class="fw-bold text-white">{{ $requirements_approve }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

       </div>

  </div>

   @elseif(auth('admin')->check())

   <div class="card-body">
        {{-- tasks --}}
       <div class="row g-3 g-xl-3">
           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('tasks.index') }}" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">

                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.tasks') }}</div>
                       <div class="fw-bold text-white"> {{ $tasks }} </div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('tasks.index') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.waiting_tasks') }} </div>
                       <div class="fw-bold text-white">{{ $task_waiting }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('tasks.index') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{__('admin.completed_tasks')}} </div>
                       <div class="fw-bold text-white">{{ $tasks_complete }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

       </div>

        {{-- requirements --}}
       <div class="row g-3 g-xl-3">
           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('admin.requirement.requirements') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">

                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.waiting_requirements') }}</div>
                       <div class="fw-bold text-white"> {{ $requirement_waiting }} </div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('admin.requirement.requirements') }}" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.rejected_requirements') }} </div>
                       <div class="fw-bold text-white">{{ $requirement_rejected }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('admin.requirement.requirements') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.approved_requirements') }}</div>
                       <div class="fw-bold text-white">{{ $requirements_approve }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

       </div>
   </div>

   @endif
@endsection

