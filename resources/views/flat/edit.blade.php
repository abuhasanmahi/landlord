@extends('layouts/master_flat')
 
@section('content')
   <h3>Update Flat Info</h3>
   <form action="{{route('flat.update', $flat->id)}}" method="post">
    @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <label>Name</label>
                    <input type="text" name="flat_name" value="<?php echo $flat->flat_name; ?>" class="form-control" required>
                    <label>Rent</label>
                    <input type="number" name="rent" value="<?php echo $flat->rent; ?>" class="form-control" required>
                    <label>Electricity Bill</label>
                    <input type="number" step="any" name="electricity_bill" value="<?php echo $flat->electricity_bill; ?>" class="form-control">
                    <label>Water Bill</label>
                    <input type="number" step="any" name="water_bill" value="<?php echo $flat->water_bill; ?>" class="form-control">
                    <label>Gas Bill</label>
                    <input type="number" step="any" name="gas_bill" value="<?php echo $flat->gas_bill; ?>" class="form-control">
                    <label>Trash Van</label>
                    <input type="number" step="any" name="trash_van" value="<?php echo $flat->trash_van; ?>" class="form-control">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $flat->id; ?>"/>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    <a href="{{route('flat')}}" class="btn btn-default">Cancel</a>
                    <?php $token= bin2hex(openssl_random_pseudo_bytes(13)); ?>
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                </div>
            </div>
        </div>
        <br>
    </form>
@endsection