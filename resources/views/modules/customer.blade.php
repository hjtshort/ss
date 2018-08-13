@extends('App')
@section('content')
    <script src="{{ asset('/cpanel/js/bootbox.min.js') }}"> </script>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Khách Hàng </h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form id="filterForm" class="form-inline" method="get" action="">
                                        <div class="form-group">
                                            <label for="inlineFormInput" class="sr-only">Name</label>
                                            <select id="network" name="network" class="mr-3 form-control">
                                                <option value="">Chọn nhà mạng</option>
                                                @foreach($network as $k=>$v)

                                                    <option value="{{ $v->id }}">{{ $v->Network }}</option>
                                                @endforeach
                                            </select>
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
                                            t += $('#network').val() != '' ? 'network=' + $('#network').val() + '&' : '';
                                            t += $('#inlineFormInputGroup').val() != '' ? 'search=' + $('#inlineFormInputGroup').val() + '&' : '';
                                            if (t != '?') {
                                                location.href = window.location.pathname + t.substr(0, t.length - 1);
                                            }

                                        });
                                    </script>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end">
                                    <button class="btn btn-primary " id="add" type="button">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>      <button class="btn btn-danger deleteAll">
                                                <i class="fa fa-trash" aria-hidden=""></i>
                                            </button></th>
                                        <th>Họ tên</th>
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Nhà mạng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody class="body">
                                    <tr>
                                        @forelse($customer as $k=>$v)
                                            <th scope="row">
                                                <div class="i-checks">
                                                    <input id="checkboxCustom{{ $v->id }}" type="checkbox" name="cc" value="{{ $v->id }}"  class="form-control-custom">
                                                    <label for="checkboxCustom{{ $v->id }}">&nbsp;</label>
                                                </div>
                                            </th>
                                            <td>{{ $v->Customer_name }}</td>
                                            <td>{{ $v->Customer_sex==1 ? 'Nam':'Nữ' }}</td>
                                            <td>{{ $v->Customer_email }}</td>
                                            <td>{{ $v->Customer_phone }}</td>
                                            <td>{{ $v->Customer_address }}</td>
                                            <td>{{ $v->Network }}</td>
                                            <td>
                                                <button class="btn btn-primary edit">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-danger delete">
                                                    <i class="fa fa-trash" aria-hidden=""></i>
                                                </button>
                                                <button class="btn btn-dark">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                </button>
                                            </td>

                                    </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        {{ $customer->links() }}
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
                        <h5 id="exampleModalLabel" class="modal-title">Thêm khách hàng</h5>
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
                                <input type="text" name="Customer_name" placeholder="Họ tên" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="i-checks">
                                    <input id="radioCustom1" checked type="radio" value="1" name="Customer_sex"
                                           class="form-control-custom radio-custom">
                                    <label for="radioCustom1">Nam</label>
                                </div>
                                <div class="i-checks">
                                    <input id="radioCustom2" type="radio" value="0" name="Customer_sex"
                                           class="form-control-custom radio-custom">
                                    <label for="radioCustom2">Nữ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="Customer_email" placeholder="Email Address"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="number" name="Customer_phone" placeholder="Số điện thoại"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="Customer_address" placeholder="Địa chỉ" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nhà mạng đang xử dụng</label>
                                <select name="Network_id" class="form-control">
                                    <option value="">Chọn nhà mạng</option>
                                    @foreach($network as $key=>$val)
                                        <option value="{{ $val->id }}">{{ $val->Network }}</option>
                                    @endforeach
                                </select>
                                <input type="text" hidden name="Ctv_id" value="{{ Auth::user()->id }}">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Đóng</button>
                        <button type="button" class="btn btn-primary" id="addCustomer">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">Chỉnh sửa thông tin khách hàng</h5>
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
                                <input type="text" name="Customer_name" value="123" placeholder="Họ tên"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <select id="editCustomer_sex" name="Customer_sex" class="form-control">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="Customer_email" placeholder="Email Address"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="number" name="Customer_phone" placeholder="Số điện thoại"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="Customer_address" placeholder="Địa chỉ" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nhà mạng đang xử dụng</label>
                                <select id="editNetwork" name="Network_id" class="form-control">
                                    <option value="">Chọn nhà mạng</option>
                                    @foreach($network as $key=>$val)
                                        <option value="{{ $val->id }}">{{ $val->Network }}</option>
                                    @endforeach
                                </select>
                                <input type="text" hidden name="Customer_id" value="">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Đóng</button>
                        <button type="button" class="btn btn-primary" id="editCustomer">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('#add').click(function () {
            $('#myModal').modal('show')
        })
        $('#addCustomer').click(function () {
            var data = $('#myForm').serialize()
            $.ajax({
                url: '{{ route('insertCustomer') }}',
                type: 'POST',
                data: data,
                success: function (response) {

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
            var id = $(this).closest('tr').find('input[type=checkbox]').val()
            $.ajax({
                url: '{{ route('getCustomer') }}',
                type: 'POST',
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#myForm2').find('input[name="Customer_name"]').val(response.Customer_name);
                    $('#myForm2').find('#editCustomer_sex').val(response.Customer_sex);
                    $('#myForm2').find('input[name="Customer_email"]').val(response.Customer_email);
                    $('#myForm2').find('input[name="Customer_phone"]').val(response.Customer_phone);
                    $('#myForm2').find('input[name="Customer_address"]').val(response.Customer_address);
                    $('#myForm2').find('input[name="Customer_id"]').val(response.id);
                    $('#myForm2').find('#editNetwork').val(response.Network_id);
                    $('#editModal').modal('show')
                }
            })
        })
        $('#editCustomer').click(function(){
            var data= $('#myForm2').serialize()
            $.ajax({
                url: '{{ route('editCustomer') }}',
                type: 'POST',
                data:data,
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
        $('.delete').click(function(){
            var id= $(this).closest('tr').find('input[type=checkbox]').val()
            bootbox.confirm({

                message: "Bạn muốn xóa khách hàng đã chọn?",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            url: '{{ route('deleteCustomer') }}',
                            type: 'POST',
                            data: {
                                'id':id,
                                '_token':'{{ csrf_token() }}'
                            },
                            success: function (response) {
                                if(response=='ok')
                                    location.reload()
                            }
                        })
                    }

                }
            });

        })
        $('.deleteAll').click(function(){
            var id=[];
            $('.body').find('input[type="checkbox"]:checked').each(function () {
                   id.push(this.value)
            });
            bootbox.confirm({

                message: "Bạn muốn xóa các khách hàng đã chọn?",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            url: '{{ route('deleteMultipleCustomer') }}',
                            type: 'POST',
                            data: {
                                'id':id,
                                '_token':'{{ csrf_token() }}'
                            },
                            success: function (response) {
                                if(response=='ok')
                                    location.reload()
                            }
                        })
                    }else{
                        $('.body').find('input[type="checkbox"]:checked').each(function () {
                            $(this).prop('checked',false)
                        });
                    }

                }
            });


        })

    </script>
@endsection