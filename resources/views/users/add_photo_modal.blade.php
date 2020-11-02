<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 99999999999">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form_ajax_item_file" action="users/photos/add/{{ $users->id }}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Добавление фото</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control-file" id="image" type="file" multiple accept=".txt,image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Загрузить</button>
                </div>
            </form>
        </div>
    </div>
</div>