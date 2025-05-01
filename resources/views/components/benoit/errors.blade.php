
<?php
    if (Session::has('status')) {
        if (Session::get('status') === 'success') {
            $color = 'green';
        } elseif (Session::get('status') === 'error') {
            $color = 'red';
        }
    }
?>

<!--Messages d'erreurs renvoyés automatiquement par les FormRequest-->
@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>    
@endif

<!--Messages renvoyés par certains contrôleurs-->
@if(Session::has('status'))
    <p style="color:{{ $color }};">{{ Session::get('message') }}</p>
@endif