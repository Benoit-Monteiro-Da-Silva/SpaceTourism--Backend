
<!DOCTYPE html>
<html lang='en'>
<head>
    <title>SpaceTourism - New Destination</title>
</head>

<body>
    <h1>New Destination</h1>

    <!--Petit composant maison qui gère tous les messages d'erreurs renvoyés par les contrôleurs-->
    <x-benoit.errors/>

    <form action='{{ route('store_destination') }}' method="POST" enctype='multipart/form-data'>
        @csrf
        
        <label>Name :
            <input type="text" name="name" value="{{ old('name') }}" required>
        </label>

        <label>Distance :
            <input type="text" name="distance" value="{{ old('distance') }}" required>
        </label>

        <label>Travel Time :
            <input type="text" name="travel_time" value="{{ old('travel_time') }}" required>
        </label>

        <br>

        <label>Description :
            <br>
            <textarea name="description" required style="width:95vw; height:100px; resize:none;">{{ old('description') }}</textarea>
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
    <a href="{{ route('list_destinations') }}">Back</a>

<x-benoit.script/>
</body>
</html>