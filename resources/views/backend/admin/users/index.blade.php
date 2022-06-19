@extends('layouts.master')

 @section('title')
  Users
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> </h6>
        <div class="ml-auto">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i></span>
               <span> {{ __('admin.add_user') }} </span>
           </a>

           <a href="{{ route('users.uploadcsv') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i></span>
               <span> {{ __('admin.import_users') }} </span>
           </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"  id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px"> {{ __('admin.name') }} </th>
                   <th class="min-w-140px"> {{ __('admin.email') }} </th>
                   <th class="min-w-140px"> {{ __('admin.job_title') }} </th>
                   <th class="min-w-140px"> {{ __('admin.img') }} </th>
                   <th class="min-w-130px"> {{ __('admin.company') }} </th>
                   <th class="min-w-120px"> {{ __('admin.section') }} </th>
                    <th class="min-w-110px"> {{ __('admin.avg_rate') }} </th>
                    <th class="min-w-110px"> {{ __('admin.export') }} </th>
                    <th class="min-w-110px"> {{ __('admin.tasks') }} </th>
                   <th class="min-w-100px" style="width:30px ;">  {{ __('admin.action') }} </th>

               </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>

                    <td></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->job_title }}</td>

                    @if($user->img)
                    <td>
                        <img src="{{ asset('Attachments/users/'.$user->img) }}" width="70px" alt="">
                    </td>
                    @else

                    <td>
                        <img src="{{ asset('Attachments/users/1.png') }}" width="70px" alt="">
                    </td>

                    @endif
                    <td>{{ $user->company->name }}</td>
                    <td>{{ $user->section->name }}</td>
                    <td>{{ $user->avg_rates() }}</td>
                    <td>
                        <a href="export/{{$user->id}}" class="btn btn-primary">
                               <i class="fas fa-file-export"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('tasks.index', ['userId'=>$user->id])}}" class="btn btn-primary">
                                tasks
                        </a>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('users.edit' , $user->id) }}" class="btn btn-primary">
                               <i class="fa fa-edit"></i>
                            </a>


                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $user->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                          @include('backend.admin.users.delete')

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
