<div class="card">
    <div class="card-header">
        <h3 class="card-title">Account User</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover" id="acc-user">
            <thead>
            <tr>
                <th style="width: 30px">Action</th>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Info</th>
                <th>Avatar</th>
                <th>Status</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data_users as $u)
                <tr>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu" style="min-width: auto">
                                <li>
                                    <a class="dropdown-item edit" href="javascript:void(0)" data-id="{{ $u['id'] }}"><i class="fas fa-pencil-alt text-success mr-2"></i>Sửa</a>
                                </li>
                                <li>
                                    <a class="dropdown-item edit-avatar" href="javascript:void(0)" data-id="{{ $u['id'] }}"><i class="fas fa-highlighter text-success mr-2"></i>Sửa Avatar</a>
                                </li>
                                <li>
                                    <a class="dropdown-item delete" href="javascript:void(0)" data-id="{{ $u['id'] }}"><i class="fas fa-trash-alt text-danger mr-2"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>{{ $u['id'] }}</td>
                    <td><span class="text-danger font-weight-bold">{{ $u['name'] }}</span></td>
                    <td>
                        <span class="d-block text-success">Email: {{ $u['email'] }}</span>
                        <span class="d-block">Phone: {{ $u['phone'] }}</span>
                        <span class="d-block">Ngày sinh: {{ $u['date_of_birth'] }}</span>
                        <span class="d-block">Tuổi: {{ $u['age'] ?? 'Không xác định' }}</span>
                        <span class="d-block">Giới tính: {{ $u['gender'] == 1 ? 'Nam' : 'Nữ' }}</span>
                        <span class="d-block">Địa chỉ: {{ $u['address'] }}</span>
                    </td>
                    <td>
                        <span class="avatar">
                            <img src="{{ url('upload/avatar/'.$u['avatar']) }}" alt="">
                        </span>
                    </td>
                    <td><span>{{ $u['status'] == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>{{ $u['created_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="right">
            @include('admin::components.paginate.paginate', [
                'uri' => route('get.users.index')
            ])
        </div>
    </div>
</div>
