<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="margin-left: calc(50% - 400px)">
        <div class="modal-content" style="width: 800px">
            <div class="modal-header">
                <h5 class="modal-title">Фотографии<button type="button" class="btn btn-outline-success action_modal ml-2" show="1" link="/users/photos/add/{{ $users->id }}">Добавить</button></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" id="photo_body" style="width: 800px">
                @foreach ($dir as $key => $value)
                    @if ($value != '.' and $value != '..')
                        <div class="img-card">
                            <i class="fas fa-times del_photo" link="/users/photos/delete/{{ $users->id }}" data="{{ $value }}" title="Удалить"></i><img src="{{ $folder }}/{{ $value }}"/>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>