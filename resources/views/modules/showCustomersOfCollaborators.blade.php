@extends('App')
@section('content')
    <script src="{{ asset('/cpanel/js/bootbox.min.js') }}"></script>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Khách hàng được thêm bởi cộng tác viên {{ $collaborators->name }} </h1>
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
                                    </tr>
                                    </thead>
                                    <tbody class="body">
                                    @forelse($customers as $k=>$v)
                                        <tr>

                                            <th class="employeeId" scope="row">
                                                {{ $v->id }}
                                            </th>
                                            <td>{{ $v->Customer_name }}</td>
                                            <td>{{ $v->Customer_sex==1? 'Nam':'Nữ' }}</td>
                                            <td>{{ $v->Customer_email }}</td>
                                            <td>{{ $v->Customer_phone }}</td>
                                            <td>{{ $v->Customer_address }}</td>

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
    </section>
@endsection