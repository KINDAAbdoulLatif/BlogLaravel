
    <h1>Yo {{ $name }}</h1>
    @if($age < 18)
        <p> Ado
    @else 
            <p>Adulte</p>
    @endif
    <h2>Boucles</h2>
    @for ($i = 0; $i < $nombre; $i++)
        <h2> {{ $i }}</h2>
    @endfor

    @foreach (authors as $item)
        <li>{{ $item }}</li>
    @endforeach
</body>
</html>