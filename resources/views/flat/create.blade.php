@extends('layouts/master_flat')
 
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Flat Info</h3>
        </div>
        <form action="{{ route('flat') }}" method="post">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <label>Name</label>
                        <input type="text" name="flat_name" class="form-control" required>
                        <label>Rent</label>
                        <input type="number" name="rent" class="form-control">
                        <label>Electricity Bill</label>
                        <input type="number" step="any" name="electricity_bill" class="form-control">
                        <label>Water Bill</label>
                        <input type="number" step="any" name="water_bill" class="form-control">
                        <label>Gas Bill</label>
                        <input type="number" step="any" name="gas_bill" class="form-control">
                        <label>Trash Van</label>
                        <input type="number" step="any" name="trash_van" class="form-control">
                        <br>
                        <input type="submit" class="btn btn-primary" name="save" id="submit" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                        <?php $token= bin2hex(openssl_random_pseudo_bytes(13)); ?>
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                    </div>
                </div>
            </div>
            <br>
        </form>
    </div>
@endsection