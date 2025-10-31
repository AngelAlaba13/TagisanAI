document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('iconSelect');
    const preview = document.getElementById('iconPreview');

    if (!select || !preview) {
        console.error('Select or preview element not found!');
        return;
    }

    select.addEventListener('change', function () {
        const selectedValue = this.value;
        console.log('Selected value:', selectedValue);

        if (selectedValue) {
            // Ensure the path is correct
            preview.src = ICONS_PATH + selectedValue;
        } else {
            preview.src = ICONS_PATH + 'arnis.png';
        }
    });
});
