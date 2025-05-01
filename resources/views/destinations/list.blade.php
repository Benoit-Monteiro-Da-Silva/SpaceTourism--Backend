
<!DOCTYPE html>
<html lang='en'>
<head>
    <title>SpaceTourism - Destinations</title>
</head>

<body>
    <h1>Destinations</h1>

    <!--Petit composant maison qui gère tous les messages d'erreurs renvoyés par les contrôleurs-->
    <x-benoit.errors/>

    <a href="{{ route('dashboard') }}" style="margin-right:8px;">Dashboard</a>
    <a href="{{ route('list_destinations') }}" style="margin-right:8px;">Destinations</a>
    <a href="{{ route('list_crew_members') }}" style="margin-right:8px;">Crew Members</a>
    <a href="{{ route('list_technologies') }}" style="margin-right:8px;">Technologies</a>
    <br>
    <br>
    <a href="{{ route('create_destination') }}">New Destination</a>
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Distance</th>
                <th>Travel Time</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($destinations as $destination)
                <tr>
                    <td>{{ $destination->id }}</td>
                    <td>
                        <img src='{{ asset('storage/' . $destination->image_png) }}' alt="" style="width:60px;height:auto;">
                    </td>
                    <td>{{ $destination->name }}</td>
                    <td>{{ $destination->distance }}</td>
                    <td>{{ $destination->travel_time }}</td>
                    <td>{{ $destination->description }}</td>
                    <td>
                        <a href='{{ route('edit_destination', ['id' => $destination->id]) }}'>Edit</a>
                    </td>
                    <td>
                        <form action='{{ route('destroy_destination', ['id' => $destination->id]) }}' method="POST">
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
