<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="margin-left: calc(50% - 400px)">
        <div class="modal-content" style="width: 800px">
            <form id="form_ajax_item" action="{{ route('add_user') }}" method="post" style="width: 800px" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Добавление пользователя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body" style="width: 800px">
                    <div class="form-group">
                        <label>ФИО</label>
                        <input class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Возраст</label>
                        <input type="number" class="form-control" name="age">
                    </div>
                    <div class="form-group">
                        <label>Пол</label>
                        <select class="form-control" name="gender">
                            <option value="1">М</option>
                            <option value="2">Ж</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Профессия</label>
                        <input class="form-control" name="profession">
                    </div>
                </div>
                <div class="modal-footer">
                    <input hidden name="add" value="1">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>