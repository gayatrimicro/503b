@extends('layouts.adminapp')

@section('content')
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-lg-2 col-md-4">
		<!-- <button type="button" alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-rounded btn-block btn-outline-warning btn-sm model_img img-responsive">Add Product</button> -->
	</div>
</div>
<?php $i=0; ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    	@foreach($cat as $row)
                        @if($i!=0)
                        <br><hr><br>
                        @endif
                    	<h4 class="card-title">{{ $row['category'] }}</h4>
                    	@if(count($row['products']) > 0)
                        <table class="tablesaw table-striped table-hover table-bordered table" data-tablesaw-mode="columntoggle">
                            <thead>
                                <tr>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="width: 40%;">Product Name</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3" style="width: 25%;">Strength</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="0" style="width: 25%;">Qty / Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($row['products'] as $inrow)
                                <tr>
                                    <input type="hidden"  class="index_temp" id="index_{{ $inrow['id'] }}" value="{{$inrow['id']}}">
                                    <td class="title index_cnt" ><a class="link" href="javascript:void(0)">{{ $inrow['product_name'] }}</a></td>
                                    <td>{{ $inrow['strength'] }}</td>
                                    <td>{{ $inrow['pellet_size'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php $i++; ?>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

     <script type="text/javascript">
        // $(document).ready(function(){
            var numItems = $('.index_cnt').length;
            var index_sequence = []; 
            var seq_num = 1;
            var seq_num_val;
            

        var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });

        return $helper;
    },
        updateIndex = function(e, ui) {
            $('td.index', ui.item.parent()).each(function (i) {
                $(this).html(i+1);

            });
            
            $('input[type=text]', ui.item.parent()).each(function (i) {
                $(this).val(i + 1);
            });
           
        };

    $("#example23 tbody").sortable({
        helper: fixHelperModified,
        stop: updateIndex
    }).disableSelection();
    
        $("tbody").sortable({
        distance: 5,
        delay: 100,
        opacity: 0.6,
        cursor: 'move',
        update: function() {
            var values = $('.index_temp').map(function() { return this.value; }).get();
            token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:'GET',
                url:"{{ URL::to('/product/sequence') }}"+"/"+values,
                data:{ _token: token},
                success:function(data){
                    
                } ,error:function() { 
                    alert("Something went wrong"); 
                }
            });
            
            //alert(values);
        }
        });
     </script>
     <style type="text/css">
        td:hover{
                cursor:move;
        }
     </style>
     
@endsection
