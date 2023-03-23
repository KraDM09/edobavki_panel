class DeleteModal {
    constructor() {
        this.modal = document.getElementById('deleteModal');
    }

    init() {
        if (!this.modal) {
            return;
        }

        this.modal.addEventListener('show.bs.modal',  (event) => {
            const button = event.relatedTarget
            const id = button.getAttribute('data-bs-id')
            const btn = this.modal.querySelector('button[name="delete"]')

            btn.dataset.id = id;
        })
    }
}

document.addEventListener("DOMContentLoaded", (event) => {
    window.deleteModal = new DeleteModal();
    window.deleteModal.init();
});
