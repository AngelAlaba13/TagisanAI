document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('iconSelect');
    const preview = document.getElementById('iconPreview');

    if (!select || !preview) {
        window.location.href = "{{ route('error-handling.error520') }}";
        return;
    }

    select.addEventListener('change', function () {
        const selectedValue = this.value;

        if (selectedValue) {
            preview.src = ICONS_PATH + selectedValue;
        } else {
            preview.src = ICONS_PATH + 'arnis.png';
        }
    });

    const initial = select.value;
    if (initial) {
        preview.src = ICONS_PATH + initial;
    }
});
