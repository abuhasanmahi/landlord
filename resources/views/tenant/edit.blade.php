@extends('layouts/master_tenant')
 
@section('content')
   <h3>Update Tenant Info</h3>
   <form action="{{route('tenant.update', $tenant->id)}}" method="post">
    @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $tenant->name; ?>" class="form-control" required>
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $tenant->email; ?>" class="form-control">
                    <label>Mobile</label>
                    <input type="text" name="mobile" value="<?php echo $tenant->mobile; ?>" class="form-control">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $tenant->id; ?>"/>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    <a href="{{route('tenant')}}" class="btn btn-default">Cancel</a>
                    <?php $token= bin2hex(openssl_random_pseudo_bytes(13)); ?>
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                </div>
            </div>
        </div>
        <br>
    </form>
@endsection