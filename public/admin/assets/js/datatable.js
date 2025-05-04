
$(document).ready(function() {
    // Webinar Table List
    if ($('.webinarList').length) {
        $('.webinarList').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 d-flex justify-content-end align-items-center gap-2'fB>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-sm-6'i><'col-sm-6 d-flex justify-content-end'p>>",
            language: {
                lengthMenu: '<select class="form-select">'+
                                '<option value="10">10</option>'+
                                '<option value="25">25</option>'+
                                '<option value="50">50</option>'+
                                '<option value="100">100</option>'+
                            '</select>'
            },
            buttons: [
                {
                    extend: 'collection',
                    text: '<i class="bi bi-download"></i>',
                    className: 'btn btn-light dropdown-toggle',
                    buttons: [
                        {
                            extend: 'csv',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                        },
                        {
                            extend: 'excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                        },
                        {
                            extend: 'pdf',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                        },
                        {
                            extend: 'print',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                        }
                    ]
                }
            ],
            ajax: {
                url: webinarUrl
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'webinar_title', name: 'webinar_title' },
                { data: 'speaker_name', name: 'speaker_name' },
                { data: 'webinar_start_date', name: 'webinar_start_date' },
                { data: 'webinar_end_date', name: 'webinar_end_date' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    }





});



////delete button
$(document).on('click', '.delete-confirm', function (e) {
    e.preventDefault();
    const url = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "This Data will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
});



