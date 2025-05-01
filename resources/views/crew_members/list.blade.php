<!DOCTYPE html>
<html lang='en'>
<head>
    <title>SpaceTourism - Crew Members</title>
</head>

<body>
    <h1>Crew Members</h1>

    <!--Petit composant maison qui gère tous les messages d'erreurs renvoyés par les contrôleurs-->
    <x-benoit.errors/>

    <a href="{{ route('dashboard') }}" style="margin-right:8px;">Dashboard</a>
    <a href="{{ route('list_destinations') }}" style="margin-right:8px;">Destinations</a>
    <a href="{{ route('list_crew_members') }}" style="margin-right:8px;">Crew Members</a>
    <a href="{{ route('list_technologies') }}" style="margin-right:8px;">Technologies</a>
    <br>
    <br>
    <a href="{{ route('create_crew_member') }}">New Crew Member</a>
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Job</th>
                <th>Bio</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($crew_members as $crew_member)
                <tr>
                    <td>{{ $crew_member->id }}</td>
                    <td>
                        <img src='{{ asset('storage/' . $crew_member->image_png) }}' alt="" style="width:70px;height:auto;">
                    </td>
                    <td>{{ $crew_member->name }}</td>
                    <td>{{ $crew_member->job }}</td>
                    <td>{{ $crew_member->bio }}</td>
                    <td>
                        <a href='{{ route('edit_crew_member', ['id' => $crew_member->id]) }}'>Edit</a>
                    </td>
                    <td>
                        <form action='{{ route('destroy_crew_member', ['id' => $crew_member->id]) }}' method="POST">
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