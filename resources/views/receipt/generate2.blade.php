@extends('layouts/master_receipt')
 
@section('content')
    <div class="row">
        @foreach($receipt as $receipts)
            <?php $grand_total = $receipts->rent+$receipts->electricity_bill+$receipts->water_bill+$receipts->gas_bill+$receipts->trash_van; ?>
            <div class="col-md-12">
                <br>
                <h2 class="text-center">Rent Receipt</h2>
                <p class="text-center"><b><?php echo $receipts->month.', '.$receipts->year; ?></b></p>
                <div class="page-header clearfix" style="text-align:left;">
                    <b style="float:left;">Name: <?php echo $receipts->name; ?></b>
                    <span style="float:right;">
                        <b>Flat: <?php echo $receipts->flat_name; ?></b>
                    </span>
                </div>
                <br><br>
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>House Rent</th>
                        <td><?php echo $receipts->rent; ?></td>
                    </tr>
                    <tr>
                        <th>Electricity Bill</th>
                        <td><?php if($receipts->electricity_bill != 0) echo $receipts->electricity_bill; else echo 'Due'; ?></td>
                    </tr>
                    <tr>
                        <th>Water Bill</th>
                        <td><?php echo $receipts->water_bill; ?></td>
                    </tr>
                    <tr>
                        <th>Gas Bill</th>
                        <td><?php echo $receipts->gas_bill; ?></td>
                    </tr>
                    <tr>
                        <th>Trash Van</th>
                        <td><?php echo $receipts->trash_van; ?></td>
                    </tr>
                    <tr class="table-active">
                        <th>Grand Total</th>
                        <td><b><?php echo number_format($grand_total); ?></b></td>
                    </tr>
                </table>
                <br>
                <hr class="new">
                <b class="text-center">Signature & Date</b>
                <br><br>
            </div>
            <br><br>
        @endforeach
    </div><br>
@endsection