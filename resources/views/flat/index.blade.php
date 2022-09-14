@extends('layouts/master_flat')
 
@section('content')
    <div class="page-header clearfix" style="text-align:left;">
        <h3 style="float:left;">Flat List</h3>
        <span style="float:right;">
            <a href="{{ route('flat.create') }}" class="btn btn-primary">Insert Flat Info</a>
        </span>
    </div>
    <br>
   @if(count($flat) > 0)
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">Flat</th>
                <th class="text-center">Rent</th>
                <th class="text-center">Electricity</th>
		        <th class="text-center">Water</th>
                <th class="text-center">Gas</th>
		        <th class="text-center">Trash Van</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
       @foreach($flat as $flats)
           <tr>
                <td class="text-center">{{$flats->flat_name}}</td>
                <td class="text-center">{{$flats->rent}}</td>
                <td class="text-center">{{$flats->electricity_bill}}</td>
		        <td class="text-center">{{$flats->water_bill}}</td>
                <td class="text-center">{{$flats->gas_bill}}</td>
                <td class="text-center">{{$flats->trash_van}}</td>
                <td class="text-center">
                    <a href="/landlord/flat/{{$flats->id}}/edit" title='Edit Record'><i class='fas fa-pencil-alt'></i></a>
                    <a href="/landlord/flat/{{$flats->id}}/destroy" title='Delete Record' onclick="return confirm('Are you sure you want to Remove?');"><i class='fas fa-trash-alt'></i></a>
                </td>
           </tr>
       @endforeach
        </tbody>
    </table>
   @else
        <p>No record found</p>
   @endif
@endsection