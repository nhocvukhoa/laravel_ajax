<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <h1 class="text-center">Thao tác với CRUD AJAX</h1>
            <div class="d-flex flex-column">
                <a href="{{route('employee.index')}}" style="text-decoration: none; color: red; font-size: 20px;" class="mt-3 mb-1" title="Quản lý nhân viên">
                    1. Quản lý nhân viên
                </a>
                <a href="{{route('category.index')}}" style="text-decoration: none; color: red; font-size: 20px;" class="mb-3" title="Quản lý danh mục">
                    2. Quản lý danh mục
                </a>
            </div>
        </div>
    </div>
    <div class="mt-3 mb-3">

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>