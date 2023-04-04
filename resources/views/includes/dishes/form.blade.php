@if ($dish->exists)
    <form action="{{ route('admin.dishes.update', $dish->id) }}" method="POST" class="row g-3 text-white"
        enctype="multipart/form-data" novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.dishes.store') }}" method="POST" class="row g-3" enctype="multipart/form-data"
            novalidate>
@endif

@csrf
<div class="col-6">
    <label for="name" class="form-label">Nome Piatto:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        placeholder="Inserisci nome piatto" value="{{ old('name', $dish->name) }}" required>
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="col-7" id="upload-image">
    <label for="image" class="form-label">Foto piatto:</label>
    <div class="input-group mb-3">
        <button type="button" class="btn btn-success rounded-end" id="show-image-input"
            style='display:{{ $dish->exists ? 'block' : 'none' }}'><i class="fa-regular fa-image"></i> Cambia immagine</button>
        <input type="file" class="form-control rounded-start @error('image') is-invalid @enderror" id="image"
            name="image" style='display:{{ $dish->exists ? 'none' : 'block' }}' onchange="preview(event)">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-1 d-flex align-items-center">
    <img src="{{ $dish->image ? asset('storage/' . $dish->image) : 'https://www.innerintegratori.it/wp-content/uploads/2021/06/placeholder-image-300x225.png' }}"
        alt="image-preview" id="image-preview" class="img-fluid h-100">
</div>

<div class="col-4">
    <label for="price" class="form-label">Prezzo del piatto:</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
        min="0.1" max="150" step="0.1" value="{{ old('price', $dish->price) }}" required>
    @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="col-10">
    <label for="description" class="form-label">Descrizione:</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $dish->description) }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="col-2 d-flex align-items-end justify-content-end">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="availability" name="availability"
            @if (old('availability', $dish->availability)) checked @endif>
        <label class="form-check-label" for="availability">Aggiungi al menù</label>
    </div>
</div>

<div class="text-end mt-5">
    <a class="btn btn-danger"
        href="@if ($dish->exists) {{ route('admin.dishes.show', $dish->id) }}
    @else
    {{ route('admin.dishes.index') }} @endif">Annulla</a>
    <button class="btn btn-success">Salva</button>
</div>
</form>

@section('scripts')
    <script>
        const showImageInput = document.getElementById("show-image-input");
        const uploadImage = document.getElementById("image");
        showImageInput.addEventListener("click", () => {
            showImageInput.style.display = 'none';
            uploadImage.style.display = 'block';
        });
    </script>
    <script>
        const imagePreview = document.getElementById("image-preview");
        const preview = function(event) {
            if (event.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function() {
                    imagePreview.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        };
    </script>
@endsection
