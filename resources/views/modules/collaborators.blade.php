@extends('App')
@section('content')
    <script src="{{ asset('/cpanel/js/bootbox.min.js') }}"></script>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Nhân viên </h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form id="filterForm" class="form-inline" method="get" action="">
                                        <div class="form-group">
                                        </div>
                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Username</label>
                                            <input id="inlineFormInputGroup" name="search" type="text"
                                                   placeholder="Nhập tên để tìm!"
                                                   class="mr-3 form-control form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" id="Filter" value="Filter"
                                                   class="mr-3 btn btn-primary">
                                        </div>
                                    </form>
                                    <script>
                                        $('#Filter').click(function () {
                                            // console.log($('#network').val())
                                            var t = '?';
                                            t += $('#inlineFormInputGroup').val() != '' ? 'search=' + $('#inlineFormInputGroup').val() + '&' : '';
                                            if (t != '?') {
                                                location.href = window.location.pathname + t.substr(0, t.length - 1);
                                            }else{
                                                location.href = window.location.pathname
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Họ tên</th>
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody class="body">
                                    @forelse($collaborators as $k=>$v)
                                        <tr>

                                            <th class="employeeId" scope="row">
                                                {{ $v->id }}
                                            </th>
                                            <td>{{ $v->name }}</td>
                                            <td>{{ $v->sex==1? 'Nam':'Nữ' }}</td>
                                            <td>{{ $v->email }}</td>
                                            <td>{{ $v->phone }}</td>
                                            <td>{{ $v->address }}</td>
                                            <td>
                                                <button class="btn btn-primary edit">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-danger delete">
                                                    <i class="fa fa-trash" aria-hidden=""></i>
                                                </button>
                                                <a href="{{ route('getCustomersByCollaborators',$v->id) }}" class="btn btn-outline-dark">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @empty
                                    @endforelse

                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        {{ $collaborators->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title"><strong class="text-success">Thêm nhân
                                viên</strong></h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="messageErrors">

                        </div>
                        <form id="myForm">
                            @csrf
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" name="name" placeholder="Họ tên" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="i-checks">
                                    <input id="radioCustom1" checked type="radio" value="1" name="sex"
                                           class="form-control-custom radio-custom">
                                    <label for="radioCustom1">Nam</label>
                                </div>
                                <div class="i-checks">
                                    <input id="radioCustom2" type="radio" value="0" name="sex"
                                           class="form-control-custom radio-custom">
                                    <label for="radioCustom2">Nữ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="number" name="phone" placeholder="Số điện thoại"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" placeholder="Địa chỉ" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Địa chỉ mail"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" placeholder="Mật khẩu"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" name="password_confirmation" placeholder="Mật khẩu"
                                       class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Đóng</button>
                        <button type="button" class="btn btn-primary" id="addEmployee">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title"><strong class="text-primary">Chỉnh sửa thông tin
                                nhân viên</strong></h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="messageErrors2">

                        </div>
                        <form id="myForm2">
                            @csrf
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" name="name" value="123" placeholder="Họ tên"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <select id="editsex" name="sex" class="form-control">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="number" name="phone" placeholder="Số điện thoại"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" placeholder="Địa chỉ" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" disabled placeholder="Email Address"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Đổi Mật khẩu? </label>
                                <input id="checkboxChangePassword" type="checkbox" value="" class="form-control-custom">
                                <label for="checkboxChangePassword">&nbsp;</label>

                                <input type="password" id="newPassword" name="password" disabled
                                       placeholder="Mật khẩu mới"
                                       class="form-control">
                                <input type="hidden" name="id">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Đóng</button>
                        <button type="button" class="btn btn-primary" id="editEmployee">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title"><strong class="text-success">Chọn khách hàng</strong></h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                    </div>
                    <input type="hidden" id="employee_ID">
                    <div class="modal-body">
                        <div id="messageErrors">

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody class="tbody">
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Đóng</button>
                        <button type="button" class="btn btn-primary" id="addEmployeeCustomer">Chọn</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('#add').click(function () {
            $('#myModal').modal('show')
        })
        $('#addEmployee').click(function () {
            var data = $('#myForm').serialize()
            $.ajax({
                url: '{{ route('createEmployee') }}',
                type: 'POST',
                data: data,
                success: function (response) {
                    // console.log(response)
                    if (Array.isArray(response)) {
                        $('#messageErrors').html(`<div class="alert alert-danger" role="alert">${response[0]}</div>`)
                        setTimeout(function () {
                            $('#messageErrors').empty()
                        }, 3000)
                    } else if (response == 'ok') {
                        location.reload()
                    } else {
                        $('#messageErrors').html(`<div class="alert alert-warning" role="alert">Server Errors!</div>`)
                    }
                }
            })
        })
        $('.edit').click(function () {
            var id = $(this).closest('tr').find('.employeeId').text()
            $.ajax({
                url: '{{ route('getEmployee') }}',
                type: 'POST',
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#myForm2').find('input[name="name"]').val(response.name);
                    $('#myForm2').find('#editsex').val(response.sex);
                    $('#myForm2').find('input[name="email"]').val(response.email);
                    $('#myForm2').find('input[name="phone"]').val(response.phone);
                    $('#myForm2').find('input[name="address"]').val(response.address);
                    $('#myForm2').find('input[name="id"]').val(response.id);
                    $('#editModal').modal('show')
                }
            })
        })
        $("#checkboxChangePassword").change(function () {
            if (this.checked) {
                $('#newPassword').prop('disabled', false)
            } else {
                $('#newPassword').prop('disabled', true)
            }
        });
        $('#editEmployee').click(function () {
            var data = $('#myForm2').serialize()
            $.ajax({
                url: '{{ route('editEmployee') }}',
                type: 'POST',
                data: data,
                success: function (response) {

                    if (Array.isArray(response)) {
                        $('#messageErrors2').html(`<div class="alert alert-danger" role="alert">${response[0]}</div>`)
                        setTimeout(function () {
                            $('#messageErrors2').empty()
                        }, 3000)
                    } else if (response == 'ok') {
                        location.reload()
                    } else {
                        $('#messageErrors2').html(`<div class="alert alert-warning" role="alert">Server Errors!</div>`)
                    }
                }
            })
        })
        $('.delete').click(function () {
            var id = $(this).closest('tr').find('.employeeId').text()
            bootbox.confirm({

                message: "Bạn muốn xóa cộng tác viên đã chọn?",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: '{{ route('deleteEmployee') }}',
                            type: 'POST',
                            data: {
                                'id': id,
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                if (response == 'ok')
                                    location.reload()

                            }
                        })
                    }
                }
            });
        })
        $('.addCustomer').click(function(){
            var id = $(this).closest('tr').find('.employeeId').text();
            $('#employee_ID').val(id)
            $('#addCustomerModal').modal('show')
        })
        $('#addEmployeeCustomer').click(function(){
            var employee_id=$('#employee_ID').val()
            var id=[]
            $('.tbody').find('input[type="checkbox"]:checked').each(function () {
                id.push(this.value)
            })
            $.ajax({
                url: '{{ route('addmanage') }}',
                type: 'POST',
                data: {
                    'id':id,
                    'employee_id':employee_id,
                    '_token':'{{ csrf_token() }}'
                },
                success: function (response) {
                    if(response=='ok')
                        location.reload()
                }
            })

        })

    </script>
@endsection