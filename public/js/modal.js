//=================== STATUS ===================//

$(document).ready(function() {
    var table = $('#statusTable').DataTable();

    //=============== EDIT ===============/
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }
        // use event.preventDefault(); or #
        var data = table.row($tr).data();
        console.log(data);

        $('#status').val(data[1]);

        $('#editStatus').attr('action', '/status/' + data[0]);
        $('#editModal').modal('show');
    });

    //========================== DELETE ===========================

    table.on('click', '.delete', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }

        // $('#id').val(data[0]);

        var data = table.row($tr).data();
        console.log(data);

        $('#deleteStatus').attr('action', '/status/' + data[0]);
        $('#deleteModal').modal('show');

    });
});

//=================== END OF STATUS ===================//

//=================== TYPE ===================//

$(document).ready(function() {
    var table = $('#typeTable').DataTable();

    //=============== EDIT ===============/
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }
        // use event.preventDefault(); or #
        var data = table.row($tr).data();
        console.log(data);

        $('#type').val(data[1]);

        $('#editType').attr('action', '/type/' + data[0]);
        $('#editModal').modal('show');
    });

    //========================== DELETE ===========================

    table.on('click', '.delete', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }

        // $('#id').val(data[0]);

        var data = table.row($tr).data();
        console.log(data);

        $('#deleteType').attr('action', '/type/' + data[0]);
        $('#deleteModal').modal('show');

    });

    //=================== END OF TYPE ===================//

    //=================== TASKS ===================//

    $(document).ready(function() {
        var table = $('#taskTable').DataTable();

        //=============== EDIT ===============/
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('parent');
            }
            // use event.preventDefault(); or #
            var data = table.row($tr).data();
            console.log(data);

            $('#type').val(data[2]);

            $('#task_name').val(data[2]);
            $('#product_owner').val(data[3]);
            $('#start_date').val(data[4]);
            $('#target_completion').val(data[5]);

            $('#status').val(data[6]);

            $('#remarks').val(data[7]);

            $('#editTask').attr('action', '/task/' + data[0]);
            $('#editModal').modal('show');
        });

        //========================== DELETE ===========================

        table.on('click', '.delete', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('parent');
            }

            // $('#id').val(data[0]);

            var data = table.row($tr).data();
            console.log(data);

            $('#deleteTask').attr('action', '/task/' + data[0]);
            $('#deleteModal').modal('show');

        });

        //=================== END OF TYPE ===================//


    });
});