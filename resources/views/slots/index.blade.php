<table >
    <thead >
    <tr>
        <th style="width: 5%;">id</th>
        <th style="width: 10%;">name</th>
        <th style="width: 15%;">password/th>
        <th style="width: 15%;">image</th>
        <th style="width: 15%;">email</th>
        <th style="width: 10%;">phone</th>
        <th style="width: 10%;">date</th>
        <th class="text-uppercase" style="width: 10%;">role</th>
    
        <th style="width: 10%;">action</th>
    </tr>
    </thead>

    <tbody id="set-rows">
    
    @dump($users)
        @foreach($users as $index => $user)
        <tr>

            <td>{{ $user['name'] ?? ''}}</td>
            <td>{{ $user['phone']?? ''  }}</td>
            <td>{{ $user['email'] ?? '' }}</td>
            <td>{{ $user['password'] ?? '' }}</td>
            <td>{{ $user['role'] ?? '' }}</td>
            <td>{{ $user['image'] ?? '' }}</td>
            <td>{{ $user['date'] ?? '' }}</td>
            <td>
                <form action="{{route('home.destroy', $index)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <a href="{{ route('home.edit', $index) }}">edit</>
                    <button type="submit">delete</button>
                </form>
               
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<hr>