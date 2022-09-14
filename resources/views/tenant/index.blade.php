@extends('layouts/master_tenant')
 
@section('content')
    <div class="page-header clearfix" style="text-align:left;">
        <h3 style="float:left;">Tenant List</h3>
        <span style="float:right;">
            <a href="{{ route('tenant.create') }}" class="btn btn-primary">Insert Tenant Info</a>
        </span>
    </div>
    <br>
   @if(count($tenant) > 0)
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Flat</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
       @foreach($tenant as $tenants)
           <tr>
                <td class="text-center">{{$tenants->name}}</td>
                <td class="text-center">{{$tenants->flat_name}}</td>
                <td class="text-center">
                    <a href="/landlord/tenant/{{$tenants->id}}/edit" title='Edit Record'><i class='fas fa-pencil-alt'></i></a>
                    <a href="/landlord/tenant/{{$tenants->id}}/destroy" title='Delete Record' onclick="return confirm('Are you sure you want to Remove?');"><i class='fas fa-trash-alt'></i></a>
                </td>
           </tr>
       @endforeach
        </tbody>
    </table>
   @else
        <p>No record found</p>
   @endif
@endsection