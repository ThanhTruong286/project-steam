                        <table class="table">
                            <thead>
                            <tr>
                                <th>Check Box</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Danh Mục</th>
                                <th>Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- xuat du lieu thuc te cua bang users -->
                            @foreach($products as $value)
                            <tr>
                                <td><input type="checkbox" id="checkAll"></td>
                                <td><img width="150px" height="80px" src="{{ asset('storage/images/' . $value->image) }}" alt=""></td>
                                <!-- information -->
                                <td>
                                    {{ $value->name }}
                                </td>
                                <!-- address field -->
                                <td>
                                    {{ number_format($value->price )}} VND
                                </td>
                                <td>{{ $value->category->name }}</td>

                                <!-- edit button -->
                                <td>
                                    <a href="{{route('product.edit.form',['product_id'=>$value->id])}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('product.delete',['product_id'=>$value->id,'file'=>$value->image])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- tao phan trang bang ham links() su dung bootstrap-4 -->
                        {{ $products->links('pagination::bootstrap-4') }}