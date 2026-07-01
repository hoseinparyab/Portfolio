export function initFileUploads(root = document) {
    root.querySelectorAll('.file-upload__input').forEach((input) => {
        const wrapper = input.closest('.file-upload');
        const nameEl = wrapper?.querySelector('.file-upload__name');
        if (!nameEl) {
            return;
        }

        const placeholder = nameEl.dataset.filePlaceholder || 'فایلی انتخاب نشده';

        const updateName = () => {
            const hasFile = Boolean(input.files?.[0]);
            nameEl.textContent = hasFile ? input.files[0].name : placeholder;
            nameEl.classList.toggle('file-upload__name--selected', hasFile);
        };

        input.addEventListener('change', updateName);
        updateName();
    });

    root.querySelectorAll('label').forEach((label) => {
        const input = label.querySelector(':scope > input[type="file"].hidden, :scope > input[type="file"][class*="hidden"]');
        if (!input) {
            return;
        }

        const message = label.querySelector('[data-dropzone-message]');
        if (!message) {
            return;
        }

        const defaultMessage = message.innerHTML;

        input.addEventListener('change', () => {
            if (input.files?.[0]) {
                message.innerHTML = `<span class="font-semibold text-green-500 dark:text-green-400">${input.files[0].name}</span>`;
                return;
            }

            message.innerHTML = defaultMessage;
        });
    });
}
