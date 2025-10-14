
<form action="/products/create" method="POST">
@csrf
<div>
    <label for="name">Naziv</label>
    <input id="name"
           name="name"
           type="text"
           maxlength="64"
           value="{{ old('name') }}"
           required>
    @error('name')
    <div class="error">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="description">Opis</label>
    <textarea id="description"
              name="description"
              rows="5"
              required>{{ old('description') }}</textarea>
    @error('description')
    <div class="error">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="price">Cena (RSD)</label>
    <input id="price"
           name="price"
           type="number"
           min="0"
           step="1"
           value="{{ old('price') }}"
           required>
    @error('price')
    <div class="error">{{ $message }}</div>
    @enderror
</div>

<button type="submit">Sačuvaj</button>
</form>
