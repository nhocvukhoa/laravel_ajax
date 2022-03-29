@extends('Layouts.app')

@section('page_content')
{{-- add new Category modal start --}}
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="add_category_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4 bg-light">
                    <div class="my-2">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" class="form-control mt-2" placeholder="Nhập tên danh mục" required>
                    </div>
                    <div class="my-2">
                        <label for="cat_status">Tình trạng</label>
                        <select name="cat_status" class="form-control input-sm mt-2">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add_category_btn" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- add new Category modal end --}}

{{-- edit Category modal start --}}
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật danh mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="edit_category_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="modal-body p-4 bg-light">
                    <div class="my-2">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control mt-2" placeholder="Nhập tên danh mục" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="edit_category_btn" class="btn btn-success">Cập nhật</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- edit Category modal end --}}

{{-- active Category modal start --}}
<div class="modal fade" id="edit2CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kích hoạt danh mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="active_category_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="modal-body p-4 bg-light">
                    <div class="my-2">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control mt-2" placeholder="Nhập tên danh mục" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="active_category_btn" class="btn btn-success">Cập nhật</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- active Category modal end --}}


<body class="bg-light">
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-danger d-flex justify-content-between align-items-center">
                        <h3 class="text-light mb-0">Quản lý danh mục</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="bi-plus-circle me-2"></i>Thêm</button>
                    </div>
                    <div class="card-body" id="show_all_categories">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục nè </th>
                                <th>Tình trạng</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                @foreach($cats as $key=> $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{$item->cat_name}}</td>
                                    <td>
                                        <?php
                                        if ($item->cat_status == 0) {
                                        ?>
                                            <a href="#" id="{{$item->id}}" class="btn btn-danger" title="Mở khóa" data-bs-toggle="modal" data-bs-target="#edit2CategoryModal">
                                                Đang khóa
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="#" class="btn btn-success mr-2" title="Khóa">
                                                Mở khóa
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="#" id="{{$item->id}}" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                            <i class="bi-pencil-square h4"></i>
                                        </a>
                                        <a href="#" id="{{$item->id}}" class="text-danger mx-1 deleteIcon">
                                            <i class="bi-trash h4"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<div id="even"></div>
@endsection

@section('ajax_script')
<script>
    // fetchAllCategory();

    // function fetchAllCategory() {
    //     $.ajax({
    //         url: "{{ route('category.fetchAll') }}",
    //         method: 'GET',
    //         success: function(res) {
    //             $("#show_all_categories").html(res);
    //             $("table").DataTable({
    //                 order: [0, 'desc']
    //             });
    //         }
    //     });
    // }

    $('#add_category_form').submit(function(e) {
        e.preventDefault();
        const data = new FormData(this);
        $('#add_category_btn').text('Đang thêm...');
        $.ajax({
            url: "{{ route('category.store') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status == 200) {
                    Swal.fire(
                        'Đã thêm',
                        'Danh mục được thêm thành công!',
                        'success'
                    )
                }
                location.reload(); // then reload the page.(3)
                $('#add_category_btn').text('Thêm');
                $('#add_category_form')[0].reset();
                $('#addCategoryModal').modal('hide');
            }
        });
    });

    $(document).on('click', '.activeIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        // console.log(id);
        $.ajax({
            url: "{{ route('category.active') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            data: {
                id: id,
                _token: "{{ csrf_token() }}",
            },
            success: function(res) {
                $("#id").val(res.id);
            }
        });
    });

    $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        // console.log(id);
        $.ajax({
            url: "{{ route('category.edit') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            data: {
                id: id,
                _token: "{{ csrf_token() }}",
            },
            success: function(res) {
                $("#cat_name").val(res.cat_name);
                $("#id").val(res.id);
            }
        });
    });

    $("#edit_category_form").submit(function(e) {
        e.preventDefault();
        const data = new FormData(this);
        $("#edit_category_btn").text("Đang cập nhật");
        $.ajax({
            url: "{{ route('category.update') }}",
            method: 'post',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(res) {
                if (res.status == 200) {
                    Swal.fire(
                        'Đã cập nhật!',
                        'Cập nhật danh mục thành công!',
                        'success'
                    )
                }
                location.reload(); // then reload the page.(3)
                $("#edit_category_btn").text('Cập nhật');
                $("#edit_category_form")[0].reset();
                $("#editCategoryModal").modal('hide');
            }
        });
    });



    $("#active_category_form").submit(function(e) {
        e.preventDefault();
        const data = new FormData(this);
        $("#active_category_btn").text("Đang kích hoạt...");
        $.ajax({
            url: "{{ route('category.perform_active') }}",
            method: 'post',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(res) {
                if (res.status == 200) {
                    Swal.fire(
                        'Đã kích hoạt!',
                        'Kích hoạt danh mục thành công!',
                        'success'
                    )
                }
                location.reload(); // then reload the page.(3)
                $("#active_category_btn").text('Kích hoạt');
                $("#active_category_form")[0].reset();
                $("#activeCategoryModal").modal('hide');
            }
        });
    });

    $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        Swal.fire({
            title: 'Bạn muốn xóa danh mục này không?',
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
                    url: "{{ route('category.delete')}}",
                    method: "post",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        Swal.fire(
                            'Đã xóa!',
                            'Xóa danh mục thành công',
                            'success'
                        )
                        location.reload();
                    }
                });
            }
        })
    });
</script>
@endsection