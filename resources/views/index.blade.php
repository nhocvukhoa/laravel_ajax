<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

{{-- add new employee modal start --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4 bg-light">
                    <div class="my-2">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="my-2">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="my-2">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="my-2">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
                    </div>
                    <div class="my-2">
                        <label for="post">Post</label>
                        <input type="text" name="post" class="form-control" placeholder="Post" required>
                    </div>
                    <div class="my-2">
                        <label for="avatar">Select Avatar</label>
                        <input type="file" name="avatar" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add_employee_btn" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật nhân viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="emp_id" id="emp_id">
                <input type="hidden" name="emp_avatar" id="emp_avatar">
                <div class="modal-body p-4 bg-light">
                    <div class="my-2">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="my-2">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="my-2">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="my-2">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone" required>
                    </div>
                    <div class="my-2">
                        <label for="post">Post</label>
                        <input type="text" name="post" id="post" class="form-control" placeholder="Post" required>
                    </div>
                    <div class="my-2">
                        <label for="avatar">Select Avatar</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <div class="mt-2" id="avatar"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="edit_employee_btn" class="btn btn-success">Cập nhật</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- edit employee modal end --}}

<body class="bg-light">
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-danger d-flex justify-content-between align-items-center">
                        <h3 class="text-light mb-0">Quản lý nhân viên</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="bi-plus-circle me-2"></i>Thêm</button>
                    </div>
                    <div class="card-body" id="show_all_employees">
                        <!-- <h1 class="text-center text-secondary my-5">Loading...</h1> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    //TODO: *** Fetch all data ***
    fetchAllEmployees();

    function fetchAllEmployees() {
        $.ajax({
            url: "{{ route('fetchAll') }}",
            method: 'GET',
            success: function(res) {
                $("#show_all_employees").html(res);
                $("table").DataTable({
                    order: [0, 'desc']
                });
            }
        });
    }

    //TODO: Delete 
    $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        Swal.fire({
            title: 'Bạn muốn xóa nhân viên này không?',
            text: "Hãy cân nhắc!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa!',
            cancelButtonText: 'Thoát'
        }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                    url: "{{ route('delete' )}}",
                    method: "post",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (res) {
                        Swal.fire(
                            'Đã xóa!',
                            'Xóa nhân viên thành công',
                            'success'
                        )
                        fetchAllEmployees();
                    }
               });
            }
        })
    });


    //TODO: Open edit employee
    $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        // console.log(id);
        $.ajax({
            url: "{{ route('edit') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            data: {
                id: id,
                _token: "{{ csrf_token() }}",
            },
            success: function(res) {
                $("#first_name").val(res.first_name);
                $("#last_name").val(res.last_name);
                $("#email").val(res.email);
                $("#phone").val(res.phone);
                $("#post").val(res.post);
                $("#avatar").html(`<img src="storage/images/${res.avatar}" width="100" class="img-fluid img-thumbnail">`);
                $("#emp_id").val(res.id);
                $("#emp_avatar").val(res.avatar);
            }
        });
    });

    //TODO: Update employee 
    $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_employee_btn").text('Đang cập nhật...');
        $.ajax({
            url: "{{ route('update') }}",
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    Swal.fire(
                        'Đã cập nhật!',
                        'Cập nhật nhân viên thành công!',
                        'success'
                    )
                    fetchAllEmployees();
                }
                $("#edit_employee_btn").text('Cập nhật');
                $("#edit_employee_form")[0].reset();
                $("#editEmployeeModal").modal('hide');
            }
        });
    });

    //TODO: Add employee
    $('#add_employee_form').submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_employee_btn").text('Đang thêm');
        $.ajax({
            url: "{{ route('store')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status == 200) {
                    Swal.fire(
                        'Đã thêm!',
                        'Nhân viên được thêm thành công!',
                        'success'
                    )
                    fetchAllEmployees();
                }
                $("#add_employee_btn").text('Thêm');
                $("#add_employee_form")[0].reset();
                $("#addEmployeeModal").modal('hide');
            }
        });

    });
</script>

</html>