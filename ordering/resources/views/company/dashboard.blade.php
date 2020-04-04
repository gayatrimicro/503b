@extends('layouts.companyapp')

@section('content')

<style type="text/css">
    [type=checkbox]:checked, [type=checkbox]:not(:checked){
        position: inherit !important;
        left: 1px !important;
            opacity: 11;
    }
</style>
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-lg-2 col-md-4">
        <!-- <button type="button" alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-rounded btn-block btn-outline-warning btn-sm model_img img-responsive">Add Product</button> -->
    </div>
</div>
<?php $i=0; ?>
<div class="container-fluid relative">

    <div class="row">
        <div class="col-11">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <form method="post" id="frm1">
                        @csrf
                        @foreach($cat as $row)
                        @if(count($row['products']) > 0)
                        @if($i!=0)
                        <br><hr><br>
                        @endif
                        <h4 class="card-title">{{ $row['category'] }}</h4>
                        <table class="tablesaw table-striped table-hover table-bordered table">
                            <thead>
                                <tr>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="0" style="width: 5%;">#</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="width: 50%;">Product Name</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3" style="width: 25%;">Strength</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="0" style="width: 15%;">Qty / Size</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" style="width: 10%;">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($row['products'] as $inrow)
                                <tr>
                                    <td>
                                        <div class="demo-checkbox">
                                            <input type="checkbox" name="cb[]" value="{{$inrow['id']}}" id="checkbox{{$inrow['id']}}" />
                                        </div>
                                    </td>
                                    <td class="title">
                                        <input hidden type="text" class="input-text" name="drugname<?php echo $inrow['id']; ?>" id="drugname" value="<?php echo $inrow['product_name'] ?>" required=""> {{ $inrow['product_name'] }}
                                    </td>
                                    <td>
                                        <input hidden type="text" class="input-text" name="strength<?php echo $inrow['id']; ?>" id="strength" value="<?php echo $inrow['strength']; ?>" > {{ $inrow['strength'] }}
                                    </td>
                                    <td>
                                        <input hidden type="text" class="input-text" name="pellet-size<?php echo $inrow['id']; ?>" id="pellet-size" value="<?php echo $inrow['pellet_size']; ?>" > {{ $inrow['pellet_size'] }}
                                    </td>
                                    <td>
                                        <input require type="number" class="input-text" name="qty<?php echo $inrow['id']; ?>" min="1" max="1000" id="qty" placeholder="Qty">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php $i++; ?>
                        @endif                        
                        @endforeach
                        <div class="" style="position: fixed; top: 50%; right: 2%; z-index: 50;">
                            <input class="fixed flotingbtn btn btn-info" type="Submit" name="Submit">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(function($) {
        $('#frm1').submit(function(e){
            e.preventDefault();
            var favorite = [];
            var flag = "0";
            $.each($("input[name='cb[]']:checked"), function(){
                var valu = "qty" + $(this).val();
                var vall = document.getElementsByName(valu)[0].value;
                if (vall === undefined || vall.length <= 0){
                    //$('#popup12').fadeIn(350);
                    flag = "1";
                    alert("Please Fill up Quantity");
                    return false;
                }
                else{
                    flag = "2";
                } 
            }); 
            if(flag == "2"){
                var formData = $('#frm1').serialize();
                
                $.ajax({
                        type    : 'POST',
                        url     : "{{ URL::to('/do-order/general-products') }}",
                        data    : formData,
                        cache   : false,
                        success : function(data){                           
                            alert("Order placed successfully");
                            $('#frm1').trigger("reset");
                        } ,error:function(){ alert( "Posting failed." ); }
                    });
            }
            else if(flag == "0") {
                
                alert("Please select at least one item.");
            }
           
          });
        });
</script>
@endsection

