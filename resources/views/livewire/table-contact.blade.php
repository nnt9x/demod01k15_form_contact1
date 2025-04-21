<div>
    <table class="table table-zebra border border-gray-200">
        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
        @foreach($contacts as $row)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->email}}</td>
                <td></td>
            </tr>
        @endforeach
    </table>
</div>
