<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form_ajax_item" action="/users/delete/{{ $users->id }}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Удаление пользователя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Уверены, что хотите удалить - <strong><em>{{ $users->name }}</em></strong>?</h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <input hidden name="delete" value="1">
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </div>
            </form>
        </div>
    </div>
</div>