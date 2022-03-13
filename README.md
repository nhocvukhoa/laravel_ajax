 //TODO: Update employee
    $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        // console.log(id);
        $.ajax({
            url: "{{ route('edit) }}",
            method: 'GET',
            data: {
                id: id,
                _token: "{{ csrf_token() }}",
            },
            success: function(res) {
                console.log(res)
            }
        });
    });