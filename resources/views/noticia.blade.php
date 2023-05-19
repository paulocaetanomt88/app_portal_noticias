<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Texto</th>
        </tr>
    </thead>

    <tbody>
        @foreach($noticias as $noticia)
            <tr>
                <td>{{$noticia->titulo}}</td>
                <td>{{$noticia->texto}}</td>
            </th>
        @endforeach
    </tbody>
</table>
