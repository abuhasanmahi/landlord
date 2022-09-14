@extends('layouts/master_receipt')
 
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Generate Receipt</h3>
        </div>
        <form action="{{ route('receipt.generate') }}" method="post">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <label>Select Month:</label>
                        <select class="form-control" name="month">
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                        <br>
                        <label>Select Year</label>
                        <select class="form-control" name="year">
                            <?php $year = date('Y'); ?>
                            <option><?php echo $year; ?></option>
                            <option><?php echo $year-1; ?></option>
                            <option><?php echo $year+1; ?></option>
                        </select>
                        <br>
                        *Please note that, once generated, the rent and respective bills cannot be changed for the selected month of the selected year.
                        <br><br>
                        <label>Receipt Size</label><br>
                        <input type="radio" name="receipt_size" value="0" checked>&nbsp;Mini Version
                        <input type="radio" name="receipt_size" value="1">&nbsp;Broad Version
                        <br><br>
                        <input type="submit" name="submit" value="Generate" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <br>
        </form>
    </div>
@endsection