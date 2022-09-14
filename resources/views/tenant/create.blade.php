@extends('layouts/master_tenant')
 
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Tenant Info</h3>
        </div>
        <form action="{{ route('tenant') }}" method="post">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control">
                        <label>Flat</label>
                        <select class="form-control" name="flat_id">
                            @foreach($flat as $flats)
                                <option value="<?php echo $flats->id; ?>"><?php echo $flats->flat_name; ?></option>
                            @endforeach
                        </select>
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