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
                                    <tbody class="body" id="">
                                    @forelse($customers as $k=>$v)
                                        <tr>

                                            <th class="employeeId" scope="row">
                                                {{ $v->id }}
                                            </th>
                                            <td>{{ $v->Customer_name }}</td>
                                            <td>{{ $v->Customer_sex==1? 'Nam':'Nữ' }}</td>
                                            <td class="email">{{ $v->Customer_email }}</td>
                                            <td>{{ $v->Customer_phone }}</td>
                                            <td>{{ $v->Customer_address }}</td>
                                            <td>
                                                <button class="btn btn-outline-dark send">
                                                    <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                                                </button>
                                            </td>

                                        </tr>
                                    @empty
                                    @endforelse

                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        {{ $customers->links() }}
                                    </ul>
                                </nav>
                                <div id="loader"></div>
                            </div>
                        </div>
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
    </section>
    <script>
        $( document ).ready(function() {
            $('#loader').hide()
        });
        $('.send').click(function(){
            var email=$(this).closest('tr').find('.email').text()
            bootbox.confirm({

                message: "Bạn muốn gửi mail quản bá dịch vụ?",
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
                            url: '{{ route('sendMail') }}',
                            type: 'POST',
                            data: {
                                'email': email,
                                '_token': '{{ csrf_token() }}'
                            },
                            beforeSend:function(){
                                $('#loader').show()
                            },
                            success: function (response) {
                                if (response == 'ok')
                                        $('#loader').hide()

                            }
                        })
                    }
                }
            });
        })
    </script>
@endsection