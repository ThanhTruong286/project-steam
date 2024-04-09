                        <table class="table">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="checkAll"></th><strong>Check All</strong>
                                <th>Avatar</th>
                                <th>Number</th>
                                <th>Thông Tin Thành Viên</th>
                                <th>Địa Chỉ</th>
                                <th>Tình Trạng</th>
                                <th>Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- xuat du lieu thuc te cua bang users -->
                            @foreach($users as $value)
                            <tr>
                                <td><input type="checkbox" id="checkAll"></td>
                                <td><img width="auto" height="80px" src="{{ asset('assets/images/' . $value->image) }}" alt=""></td>
                                <td>1</td>
                                <!-- information -->
                                <td>
                                    <div class="info-item name"><strong>Họ Tên:</strong> {{ $value->fullname }}</div>
                                    <div class="info-item email"><strong>Email:</strong> {{ $value->email }}</div>
                                    <div class="info-item phone"><strong>Điện Thoại:</strong> {{ $value->phone }}</div>
                                </td>
                                <!-- address field -->
                                <td>
                                    <div class="address-item"><strong>Địa Chỉ:</strong> {{ $value->address }}</div>
                                    <div class="address-item"><strong>Phường:</strong> {{ $value->ward }}</div>
                                    <div class="address-item"><strong>Quận:</strong> {{ $value->district }}</div>
                                    <div class="address-item"><strong>Thành Phố:</strong> Không rõ</div>
                                </td>
                                <!-- switch button -->
                                <td>
                                    <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                    </label>
                                </td>
                                <!-- edit button -->
                                <td>
                                    <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- tao phan trang bang ham links() su dung bootstrap-4 -->
                        {{ $users->links('pagination::bootstrap-4') }}