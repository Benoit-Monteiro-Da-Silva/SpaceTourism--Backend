
<!DOCTYPE html>
<html lang='en'>
<head>
    <title>SpaceTourism edit : {{ $technology->name }}</title>
</head>

<body>
    <h1>{{ $technology->name }} - Edit</h1>

    <!--Petit composant maison qui gère tous les messages d'erreurs renvoyés par les contrôleurs-->
    <x-benoit.errors/>

    <form action='{{ route('update_technology', ['id' => $technology->id]) }}' method="POST" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        
        <label>Name :
            <input type="text" name="name" value="{{ old('name', $technology->name) }}" required>
        </label>

        <br>

        <label>Description :
            <br>
            <textarea name="description" required style="width:95vw; height:100px; resize:none;">{{ old('description', $technology->description) }}</textarea>
        </label>

        <br>
        <br>

        <label>Image : 
            <img class="old-image" src='{{ asset('storage/' . $technology->image_portrait) }}' alt='' style="width:60px;height:auto;">
            <input class="new-image" type="file" name='image_portrait'>
        </label>

        <br>
        <br>

        <button type="submit">Edit</button>
    </form>

    <br>
    <a href="{{ route('list_technologies') }}">Back</a>

<x-benoit.script/>
</body>
</html>