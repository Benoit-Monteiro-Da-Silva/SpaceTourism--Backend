<!DOCTYPE html>
<html lang='en'>
<head>
    <title>SpaceTourism - Technologies</title>
</head>

<body>
    <h1>Technologies</h1>

    <!--Petit composant maison qui gère tous les messages d'erreurs renvoyés par les contrôleurs-->
    <x-benoit.errors/>

    <a href="{{ route('dashboard') }}" style="margin-right:8px;">Dashboard</a>
    <a href="{{ route('list_destinations') }}" style="margin-right:8px;">Destinations</a>
    <a href="{{ route('list_crew_members') }}" style="margin-right:8px;">Crew Members</a>
    <a href="{{ route('list_technologies') }}" style="margin-right:8px;">Technologies</a>
    <br>
    <br>
    <a href="{{ route('create_technology') }}">New Technology</a>
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($technologies as $technology)
                <tr>
                    <td>{{ $technology->id }}</td>
                    <td>
                        <img src='{{ asset('storage/' . $technology->image_portrait) }}' alt="" style="width:80px;height:auto;">
                    </td>
                    <td>{{ $technology->name }}</td>
                    <td>{{ $technology->description }}</td>
                    <td>
                        <a href='{{ route('edit_technology', ['id' => $technology->id]) }}'>Edit</a>
                    </td>
                    <td>
                        <form action='{{ route('destroy_technology', ['id' => $technology->id]) }}' method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
<html>