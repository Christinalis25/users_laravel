@extends('main')
@section('title', 'Пользователи')
@section('h1', 'Пользователи')
@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="form-row">
                <div class="btn-group mb-2" role="group">
                    <button type="button" class="btn btn-outline-success action_modal"
                            link="{{ route('add_user') }}">Добавить пользователя
                    </button>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>№</th>
                    <th>ФИО</th>
                    <th>Возраст</th>
                    <th>Пол</th>
                    <th>Профессия</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="table-content">
                @foreach ($users as $user)
                    <tr>
                        <td style="width: 20px"> {{ $loop->iteration }} </td>
                        <td style="width: 300px"> {{ $user->name }} </td>
                        <td style="width: 50px"> {{ $user->age }} </td>
                        <td style="width: 50px"> {{ $user->gender == 1 ? "Мужской" : "Женский" }} </td>
                        <td style="width: 150px"> {{ $user->profession }} </td>
                        <td style="width: 100px"><i class="fas fa-pencil-alt action_modal edit_item"
                               link="/users/edit/{{ $user->id }}"></i> <i style="    margin-right: 10px;"
                                    class="far fa-trash-alt action_modal delete_item"
                                    link="/users/delete/{{ $user->id }}"></i> <i class="far fa-image action_modal photo_item" link="/users/photos/{{$user->id}}"></i>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
