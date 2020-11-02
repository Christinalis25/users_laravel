<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 999999999999999">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form_ajax_item" action="/users/photos/delete/{{ $users->id }}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Удаление фотографии</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Уверены, что хотите удалить фото?</h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <input hidden name="file_name" value="{{ $name }}">
                    <input hidden name="del_photo" value="1">
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </div>
            </form>
        </div>
    </div>
</div>