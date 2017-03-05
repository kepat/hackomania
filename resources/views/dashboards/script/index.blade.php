<script>

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    var selected = [];

    // Image is clicked
    $('[name=image]').on('click', function () {
        var id = $(this).attr('id');
        //Check if already existing
        var index = selected.indexOf(id);
        if (index > -1) {
            selected.splice(index, 1);
            $('#' + id).removeClass('image-selected');
        } else {
            selected.push(id);
            $('#' + id).addClass('image-selected');
        }
    });

    // Payment or submit is called
    $('[data-model=payment_modal]').on('click', function () {
        var title = $(this).attr('data-title');

        // Set the modal title
        var modal_title = $('#modal_title');
        modal_title.html(title);

        // Get the modal body and clear it too
        var modal_body = $('#modal_body');
        modal_body.html('');

        // Compile the buttons
        var html_data = '<div class="container-fluid"><div class="row">';

        // First Payment
        html_data = html_data + '<div class="col-md-6"><a href="print/payments/once"><button type="button" class="btn btn-info btn-fill">One Time Payment</button></a></div>';

        // Second Payment option
        html_data = html_data + '<div class="col-md-6"><a href="print/payments/monthly"><button type="button" class="btn btn-info btn-fill">Monthly Subscription</button></a></div>';

        // End payment button
        html_data = html_data + '</div></div>';

        // Append the compiled html
        modal_body.append(html_data);

        // Display the modal
        $('#modal').modal();
    });

</script>