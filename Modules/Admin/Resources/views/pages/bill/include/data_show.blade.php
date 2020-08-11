<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bill</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover" id="bill">
            <thead>
            <tr>
                <th style="width: 30px">Action</th>
                <th style="width: 50px">ID</th>
                <th>Name Customer</th>
                <th>Address Customer</th>
                <th>Phone Customer</th>
                <th>Money Bill</th>
                <th>Status</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data_bills as $b)
                <tr>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu" style="min-width: auto">
                                <li>
                                    <a class="dropdown-item edit" href="javascript:void(0)" data-id="{{ $b['id'] }}"><i class="fas fa-pencil-alt text-success mr-2"></i>Sửa</a>
                                </li>
{{--                                <li>--}}
{{--                                    <a class="dropdown-item delete" href="javascript:void(0)" data-id="{{ $b['id'] }}"><i class="fas fa-trash-alt text-danger mr-2"></i>Xóa</a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="bill-detail" data-id="{{ $b['id'] }}" data-toggle="modal" data-target="#modal-bill-detail">
                            {{ $b['id'] }}
                        </a>
                    </td>
                    <td><span class="text-danger font-weight-bold">{{ $b['username'] }}</span></td>
                    <td>{{ $b['user_address'] ?? '' }}</td>
                    <td>{{ $b['user_phone'] ?? '' }}</td>
                    <td><span class="text-success font-weight-bold">{{ number_format($b['sum_money'] ,0,",",".") .'đ' ?? '' }}</span></td>
                    <td>
                        <select name="" class="form-control bill-status" data-id="{{ $b['id'] }}">
                            <option value="1" {{ ($b['status'] == 1 ? 'selected' : '') }}>Chưa duyệt</option>
                            <option value="2" {{ ($b['status'] == 2 ? 'selected' : '') }}>Đã duyệt</option>
                            <option value="3" {{ ($b['status'] == 3 ? 'selected' : '') }}>Đã giao hàng</option>
                            <option value="4" {{ ($b['status'] == 4 ? 'selected' : '') }}>Hủy</option>
                            <option value="5" {{ ($b['status'] == 5 ? 'selected' : '') }}>Khóa</option>
                        </select>
                    </td>
                    <td>{{ $b['created_at'] ?? '' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="right">
            @include('admin::components.paginate.paginate', [
                'uri' => route('get.bills.index')
            ])
        </div>
    </div>
</div>
