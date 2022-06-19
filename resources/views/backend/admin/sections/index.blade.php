@extends('layouts.master')

 @section('title')
    Sections
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> </h6>
        <div class="ml-auto">
            <a href="{{ route('sections.create') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i></span>
               <span> {{ __('admin.add_section') }} </span>
           </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-section-dashed table-section-gray-300 align-middle gs-0 gy-4" id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{ __('admin.name') }}</th>
                   <th class="min-w-130px">{{ __('admin.company') }}</th>
                   <th class="min-w-120px">{{ __('admin.created_at') }}</th>
                   <th class="min-w-110px" style="width:30px ;"> {{ __('admin.action') }} </th>

               </tr>
            </thead>
            <tbody>
                @foreach($sections as $section)
                <tr>

                    <td></td>
                    <td>{{ $section->name }}</td>

                    <td>{{ $section->company->name }}</td>
                    <td>{{ $section->created_at }}</td>

                    <td>
                        <div class="btn-group">
                            <a href="{{ route('sections.edit' , $section->id) }}" class="btn btn-primary">
                               <i class="fa fa-edit"></i>
                            </a>


                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $section->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                           @include('backend.admin.sections.delete')
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
