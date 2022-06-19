@extends('layouts.master')

 @section('title')
   Rates
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> </h6>
        <div class="ml-auto">
            <a href="{{ route('rates.create') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i></span>
               <span> Add Rate </span>
           </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">Company</th>
                   <th class="min-w-140px">Job</th>
                   <th class="min-w-130px">User</th>
                   <th class="min-w-120px">Rate</th>
                   <th class="min-w-110px">Desc</th>
                   <th class="min-w-110px" style="width:30px ;"> Action</th>

               </tr>
            </thead>
            <tbody>
                @foreach($rates as $rate)
                <tr>

                    <td></td>

                    <td>{{ $rate->company->name }}</td>
                    <td>{{ $rate->jobs->name }}</td>
                    <td>{{ $rate->users->name }}</td>
                    <td>{{ $rate->rate }}</td>

                    <td>
                        @if (strlen($rate->desc) > 10)

                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $rate->id }}">Read more</button>
                            @include('backend.admin.rates.seemore')


                        @endif

                    </td>


                    <td>
                        <div class="btn-group">
                            <a href="{{ route('rates.edit' , $rate->id) }}" class="btn btn-primary">
                               <i class="fa fa-edit"></i>
                            </a>


                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $rate->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                           @include('backend.admin.rates.delete')
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
