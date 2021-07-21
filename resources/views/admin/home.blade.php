<html>
    <body>
        @foreach ($users as $u)
        <p> {{ $u ? $u->name : null }}</p>   
        @endforeach
    </body>
</html>