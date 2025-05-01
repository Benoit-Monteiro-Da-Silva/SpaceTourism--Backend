
<!DOCTYPE html>
<html lang='en'>
<head>
    <title>SpaceTourism - New Crew Member</title>
</head>

<body>
    <h1>New Crew Member</h1>

    <!--Petit composant maison qui gère tous les messages d'erreurs renvoyés par les contrôleurs-->
    <x-benoit.errors/>

    <form action='{{ route('store_crew_member') }}' method="POST" enctype='multipart/form-data'>
        @csrf
        
        <label>Name :
            <input type="text" name="name" value="{{ old('name') }}" required>
        </label>

        <label>Job :
            <input type="text" name="job" value="{{ old('job') }}" required>
        </label>

        <br>

        <label>Bio :
            <br>
            <textarea name="bio" required style="width:95vw; height:100px; resize:none;">{{ old('bio') }}</textarea>
        </label>

        <br>
        <br>

        <label>Image : 
            <img class='old-image' src='' alt='' style="width:60px;height:auto;">
            <input class='new-image' type="file" name='image_png'>
        </label>

        <br>
        <br>

        <button type="submit">Create</button>
    </form>

    <br>
    <a href="{{ route('list_crew_members') }}">Back</a>

<x-benoit.script/>
</body>
</html>