@extends('layouts.master')

 @section('title')
  Company
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> </h6>
        <div class="ml-auto">
            <a href="{{ route('companies.create') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i></span>
               <span> {{ __('admin.add_company') }} </span>
           </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"  id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{ __('admin.name') }}</th>
                   <th class="min-w-140px">{{ __('admin.location') }}</th>

                   <th class="min-w-120px">{{ __('admin.created_at') }} </th>
                   <th class="min-w-110px" style="width:30px ;"> {{ __('admin.action') }}</th>

               </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>

                    <td></td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->location }}</td>
                    <td>{{ $company->created_at }}</td>

                    <td>
                        <div class="btn-group">
                            <a href="{{ route('companies.edit' , $company->id) }}" class="btn btn-primary">
                               <i class="fa fa-edit"></i>
                            </a>


                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $company->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                           @include('backend.admin.companies.delete')
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
