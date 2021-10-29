<table id="zero-config" class="table table-hover " style="width:100%;">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th style="width: 30%">Product Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total = 0;
        @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>
                <tr>
                    <td>{{$details['name']}}</td>
                    <td>{{$details['price']}}</td>
                    <td>
                        <div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected updateCartProduct" data-id= "{{$id}}">
                            <input id="product_quantity" type="text" name="product_quantity" value="{{$details['quantity']}}" class="form-control">
                        </div>
                    </td>
                    <td>
                        <a type="button" data-id="{{$id}}" class="btn btn-danger deleteCartProduct" style="display: inline-block">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
</table>
<br>
@if($total > 0)
<div class="col-xl-4 col-lg-4 col-sm-4" style="margin: 0.5% auto;">
    <div class="widget-content widget-content-area" style="display: flex; padding: 8px 4px 2px 34px;">
        <h5>Total Amount : </h5>
        <h5> Rs.{{ $total}}</h5>
    </div>
</div>
@endif

<script src="{{asset('backends/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('backends/plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js')}}"></script>

<script>
    $(document).ready(function ()
    {
        $('.updateCartProduct').on('click',function ()
        {
            var id = $(this).attr('data-id');
            var quantity=  $(this).parents("tr").find("#product_quantity").val();
            var updateUrl = "{{route ('backend.carts.update')}}";
            $.ajax({
                url: updateUrl,
                method: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    product_quantity: quantity
                },
                success: function (response) {
                    loadcart();
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        padding: '1em'
                    });
                    toast({
                        type: 'success',
                        title: response.message,
                        padding: '1em',
                    });
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function ()
    {
        $('.deleteCartProduct').on('click',function ()
        {
            var id = $(this).attr('data-id');
            var deleteUrl = "{{route ('backend.carts.delete')}}";
            swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    padding: '2em',
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function(result)
                {
                    if (result.value) {
                        $.ajax(
                        {
                            method: "DELETE",
                            url: deleteUrl,
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id
                                },
                            success: function(response)
                            {
                                loadcart();
                                const toast = swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    padding: '1em'
                                });
                                toast({
                                    type: 'success',
                                    title: response.message,
                                    padding: '1em',
                                });
                            }
                        });
                    }
                });
        });
    });
</script>






