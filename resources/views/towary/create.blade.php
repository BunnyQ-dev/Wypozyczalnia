<form action="{{ route('towary.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nazwa">Nazwa:</label>
        <input type="text" name="nazwa" id="nazwa" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="opis">Opis:</label>
        <textarea name="opis" id="opis" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="cena">Cena:</label>
        <input type="number" name="cena" id="cena" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="kategoria_id">Kategoria:</label>
        <select name="kategoria_id" id="kategoria_id" class="form-control" required>
            <option value="">Wybierz kategorię</option>
            @foreach($kategorie as $kategoria)
                <option value="{{ $kategoria->id }}">{{ $kategoria->nazwa }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Dodaj</button>
</form>
