@if ($errors->any())
    <div class="alert alert-danger">
        Os seguintes erros foram encontrados
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif