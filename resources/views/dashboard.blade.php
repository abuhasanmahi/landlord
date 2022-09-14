@extends('layouts.master')
 
@section('content')
   <h1>Dashboard</h1><br>
   <div class="row">
      <div class="col-lg-4 col-6">
         <div class="small-box bg-info">
            <div class="inner">
               <h3>{{$flat}}</h3>
               <h4>Flat</h4>
            </div>
            <div class="icon">
               <i class="fas fa-building"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$tenant}}</h3>
                <h4>Tenant</h4>
            </div>
            <div class="icon">
                <i class="fas fa-home"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$receipt}}</h3>
                <h4>Receipt</h4>
            </div>
            <div class="icon">
                <i class="fas fa-receipt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection