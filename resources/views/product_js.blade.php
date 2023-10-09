<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function(){
        //add product
        $(document).on('click', '.add_product', function(e){
            e.preventDefault
            let name = $('#name').val()
            let price = $('#price').val()

            $.ajax({
                url: '{{ route('add.product') }}',
                method: 'post',
                data: {
                    name: name,
                    price: price
                },
                success: function (res) {
                    if(res.status == 'success'){
                        $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href+' .table');

                        Command: toastr["success"]("Product added successfully!", "Success")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' + value + '</span><br>');
                    });
                }
            });
        })

        //update product modal
        $(document).on('click', '.update_product_modal', function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#update_id').val(id);
            $('#update_name').val(name);
            $('#update_price').val(price);
        });

        //update product
        $(document).on('click', '.update_product', function(e){
            e.preventDefault
            let update_id = $('#update_id').val()
            let update_name = $('#update_name').val()
            let update_price = $('#update_price').val()

            $.ajax({
                url: '{{ route('update.product') }}',
                method: 'post',
                data: {
                    update_id: update_id,
                    update_name: update_name,
                    update_price: update_price
                },
                success: function (res) {
                    if(res.status == 'success'){
                        $('#updateModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href+' .table');

                        Command: toastr["success"]("Product updated successfully!", "Success")

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' + value + '</span><br>');
                    });
                }
            });
        });

        //delete product
        $(document).on('click', '.delete_product', function(e){
            e.preventDefault
            let id = $(this).data('id');

            if(confirm('Are you sure want to delete this product?')){
                $.ajax({
                    url: '{{ route('delete.product') }}',
                    method: 'post',
                    data: {
                        id: id,
                    },
                    success: function (res) {
                        if(res.status == 'success'){
                            $('.table').load(location.href+' .table');

                            Command: toastr["success"]("Are you the six fingered man?", "Success")

                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
                    }
                });
            }
        });

        $(document).on('keyup', function(e){
            e.preventDefault();

            let search = $('#search').val();

            $.ajax({
                url: "{{ route('search.product') }}",
                method: 'GET',
                data:{
                    search : search
                },
                success: function(res){
                    $('.table-data').html(res);

                    if(res.status == 'not_found'){
                        $('.table-data').html('<span class="text-danger"> Not Found </span>');
                    }
                }
            });
        });
    });
</script>
