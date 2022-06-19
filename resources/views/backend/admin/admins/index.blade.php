@extends('layouts.master')

 @section('title')
    Admins
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> </h6>
        <div class="ml-auto">
            <a href="{{ route('admins.create') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i> </span>
               <span> {{ __('admin.add_admin') }} </span>
           </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{__('admin.name')}}</th>
                   <th class="min-w-140px">{{ __('admin.email') }}</th>
                   <th class="min-w-130px">{{ __('admin.img') }}</th>
                   <th class="min-w-120px">{{ __('admin.created_at') }}</th>
                   <th class="min-w-110px" style="width:30px ;"> {{ __('admin.action') }}</th>

               </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>

                    <td></td>
                    <td>{{ $admin->admin_name }}</td>
                    <td>{{ $admin->email }}</td>

                    @if($admin->img)
                        <td>
                            <img src="{{ asset('Attachments/admins/'.$admin->img) }}" width="70px" alt="">
                        </td>
                    @else

                    <td>
                        <img src="{{ asset('Attachments/admins/1.png') }}" width="70px" alt="">
                    </td>

                    @endif
                    <td>{{ $admin->created_at }}</td>

                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admins.edit' , $admin->id) }}" class="btn btn-primary">
                               <i class="fa fa-edit"></i>
                            </a>


                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $admin->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                          @include('backend.admin.admins.delete')
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
