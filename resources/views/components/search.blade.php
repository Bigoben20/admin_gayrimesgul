@props(['label','genres' => []])

<div class="flex justify-center">
    <div class="mb-3 xl:w-96">
      <select data-te-select-init multiple {{ $attributes }}>
        @forelse ($genres as $genre)
            <option value="{{ $genre }}">{{ $genre }}</option>
        @empty
            <option value="">Hiçbir etiket bulunamadı</option>
        @endforelse
      </select>
      <label data-te-select-label-ref>{{ $label }}</label>
    </div>
  </div>
