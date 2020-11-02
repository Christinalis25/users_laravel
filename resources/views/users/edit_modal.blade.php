<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="margin-left: calc(50% - 400px)">
        <div class="modal-content" style="width: 800px">
            <form id="form_ajax_item" action="/users/edit/{{$users->id}}" method="post" style="width: 800px">
                <div class="modal-header modal-dark">
                    <h5 class="modal-title">Редактирование пользователя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body" style="width: 800px">
                    <div class="form-group">
                        <label>ФИО</label>
                        <input class="form-control" name="name" value="{{ $users->name }}">
                    </div>
                    <div class="form-group">
                        <label>Возраст</label>
                        <input type="number" class="form-control" name="age" value="{{ $users->age }}">
                    </div>
                    <div class="form-group">
                        <label>Пол</label>
                        <select class="form-control" name="gender">
                            <option {{ $users->gender == 1 ? "selected" : "" }} value="1">М</option>
                            <option {{ $users->gender == 2 ? "selected" : "" }} value="2">Ж</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Профессия</label>
                        <input class="form-control" name="profession" value="{{ $users->profession }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <input hidden name="edit" value="1">
                    <button type="submit" class="btn btn-warning">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>