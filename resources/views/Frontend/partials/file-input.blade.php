@php
    $inputId = $id ?? $name;
    $buttonText = $buttonText ?? 'انتخاب فایل';
    $placeholder = $placeholder ?? 'فایلی انتخاب نشده';
    $hint = $hint ?? null;
    $accept = $accept ?? null;
    $wrapperClass = $wrapperClass ?? '';
@endphp

<div class="file-upload {{ $wrapperClass }}">
    <input
        type="file"
        name="{{ $name }}"
        id="{{ $inputId }}"
        class="file-upload__input sr-only"
        @if ($accept) accept="{{ $accept }}" @endif
    />

    <label for="{{ $inputId }}" class="file-upload__label">
        <span class="file-upload__button">
            <i class="fa-solid fa-cloud-arrow-up" aria-hidden="true"></i>
            {{ $buttonText }}
        </span>
        <span class="file-upload__name" data-file-placeholder="{{ $placeholder }}">
            {{ $placeholder }}
        </span>
    </label>

    @if ($hint)
        <p class="file-upload__hint">{{ $hint }}</p>
    @endif
</div>
