@extends('layouts.master')

 @section('title')
    {{ __('admin.news_types') }}
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> </h6>
        <div class="ml-auto">
            <a href="{{ route('news_types.create') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i> </span>
               <span> {{ __('admin.add_news') }} </span>
           </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{__('admin.title')}}</th>
                   <th class="min-w-120px">{{ __('admin.created_at') }}</th>
                   <th class="min-w-110px" style="width:30px ;"> {{ __('admin.action') }}</th>

               </tr>
            </thead>
            <tbody>
                @foreach($news_types as $news_type)
                <tr>

                    <td></td>

                    <td>{{ $news_type->title }}</td>

                    <td>{{ $news_type->created_at }}</td>

                    <td>
                        <div class="btn-group">
                            <a href="{{ route('news_types.edit' , $news_type->id) }}" class="btn btn-primary">
                               <i class="fa fa-edit"></i>
                            </a>


                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $news_type->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                          @include('backend.admin.news_types.delete')
                        </div>

                    </td>

                 </tr>

                @endforeach




            </tbody>


        </table>
    </div>


 </div>




 @endsection



 @section('js')

 @endsection
