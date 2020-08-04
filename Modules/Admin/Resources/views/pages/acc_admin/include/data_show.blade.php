<div class="card">
    <div class="card-header">
        <h3 class="card-title">Account Admin</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover" id="acc-admin">
            <thead>
            <tr>
                <th style="width: 30px">Action</th>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Info</th>
                <th>Avatar</th>
                <th>Status</th>
                <th>Roles</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data_acc_admin as $a)
                <tr>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu" style="min-width: auto">
                                <li>
                                    <a class="dropdown-item edit" href="javascript:void(0)" data-id="{{ $a['id'] }}"><i class="fas fa-pencil-alt text-success mr-2"></i>Sửa</a>
                                </li>
                                <li>
                                    <a class="dropdown-item edit-avatar" href="javascript:void(0)" data-id="{{ $a['id'] }}"><i class="fas fa-highlighter text-success mr-2"></i>Sửa Avatar</a>
                                </li>
                                <li>
                                    <a class="dropdown-item delete" href="javascript:void(0)" data-id="{{ $a['id'] }}"><i class="fas fa-trash-alt text-danger mr-2"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>{{ $a['id'] }}</td>
                    <td><span class="text-danger font-weight-bold">{{ $a['name'] }}</span></td>
                    <td>
                        <span class="d-block text-success">Email: {{ $a['email'] }}</span>
                        <span class="d-block">Phone: {{ $a['phone'] }}</span>
                        <span class="d-block">Ngày sinh: {{ $a['date_of_birth'] }}</span>
                        <span class="d-block">Tuổi: {{ $a['age'] }}</span>
                        <span class="d-block">Giới tính: {{ $a['gender'] == 1 ? 'Nam' : 'Nữ' }}</span>
                        <span class="d-block">Địa chỉ: {{ $a['address'] }}</span>
                    </td>
                    <td>
                        <span class="avatar">
                            <img src="{{ $a['avatar'] }}" alt="">
                        </span>
                    </td>
                    <td><span>{{ $a['status'] == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        @php
                            $roles_admin = $a['roles_admin']['data'];
                        @endphp
                        @if(count($roles_admin) > 0)
                            @foreach($roles_admin as $rol)
                                <span class="badge badge-info d-inline-block mr-2 mb-1">{{ $rol['identifier_name'] }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $a['created_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="right">
            @include('admin::components.paginate.paginate', [
                'uri' => route('get.acc_admins.index')
            ])
        </div>
    </div>
</div>
