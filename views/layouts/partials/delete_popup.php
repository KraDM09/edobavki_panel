<?php
/** @var string $title */
/** @var string $url */
?>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="hidden" name="id">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"><?=$title?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button name="delete" type="button" class="btn btn-primary js-ajax-click" data-bs-dismiss="modal"
                        data-url="<?= $url ?>"
                        data-id="">Удалить
                </button>
            </div>
        </div>
    </div>
</div>
