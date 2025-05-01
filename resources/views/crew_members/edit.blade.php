
<!DOCTYPE html>
<html lang='en'>
<head>
    <title>SpaceTourism edit : {{ $crew_member->name }}</title>
</head>

<body>
    <h1>{{ $crew_member->name }} - Edit</h1>

    <!--Petit composant maison qui gère tous les messages d'erreurs renvoyés par les contrôleurs-->
    <x-benoit.errors/>

    <form action='{{ route('update_crew_member', ['id' => $crew_member->id]) }}' method="POST" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        
        <label>Name :
            <input type="text" name="name" value="{{ old('name', $crew_member->name) }}" required>
        </label>

        <label>Job :
            <input type="text" name="job" value="{{ old('job', $crew_member->job) }}" required>
        </label>

        <br>

        <label>Bio :
            <br>
            <textarea name="bio" required style="width:95vw; height:100px; resize:none;">{{ old('bio', $crew_member->bio) }}</textarea>
        </label>

        <br>
        <br>

        <label>Image : 
            <img class='old-image' src='{{ asset('storage/' . $crew_member->image_png) }}' alt='' style="width:60px;height:auto;">
            <input class='new-image' type="file" name='image_png'>
        </label>

        <br>
        <br>

        <button type="submit">Edit</button>
    </form>

    <br>
    <a href="{{ route('list_crew_members') }}">Back</a>

<x-benoit.script/>
</body>
</html>