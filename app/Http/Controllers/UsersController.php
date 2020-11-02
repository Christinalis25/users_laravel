<?php


namespace App\Http\Controllers;


use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UsersController extends Controller

{

    public
    function index()
    {
        return view('users.datatable', ['users' => (new Users())->getAll()]);
    }

    public function photos(int $id)
    {
        $users = (new Users())->getUser($id);
        echo json_encode(['modal' => View::make('users.photos_modal', ['folder' => 'storage/users/' . $id, 'dir' => scandir('storage/users/' . $id), 'users' => $users])->render()]);
    }

    public function deletePhoto(Request $request, int $id)
    {
        $users = (new Users())->getUser($id);

        if ($request->has('del_photo')) {
            if (unlink('storage/users/' . $id . '/' . $request->file_name)) {
                echo json_encode(['error' => 0, 'result' => 'Фото удалено']);
            } else {
                echo json_encode(['error' => 1, 'result' => 'Ошибка']);
            }
        } else {
            echo json_encode(['modal' => View::make('users.delete_photo', ['users' => $users, 'name' => $request->file_name])->render()]);
        }
    }

    public function addPhoto(Request $request, int $id)
    {
        $users = (new Users())->getUser($id);
        if ($request->file()) {
            foreach ($request->file() as $row) {
                move_uploaded_file($row->getPathname(), 'storage/users/' . $id . '/' . $row->getClientOriginalName());
            }
            echo json_encode(['error' => 0, 'result' => 'Фото добавлено']);
        } else {
            echo json_encode(['modal' => View::make('users.add_photo_modal', ['users' => $users])->render()]);
        }
    }

    public function add(Request $request)
    {
        if ($request->has('add')) {
            $error = [];
            if (!$request->input('name')) {
                $error[] = 'Укажите ФИО!';
            }
            if (!$request->input('age')) {
                $error[] = 'Укажите Возраст!';
            }
            if (!$request->input('gender')) {
                $error[] = 'Укажите пол!';
            }

            if ($error) {
                $result = [
                    'error' => 1,
                    'result' => implode("<br />", $error)
                ];
                echo json_encode($result);
            } else {

                (new Users())->addUser($request);
                echo json_encode(['error' => 0, 'result' => 'Пользователь успешно добавлен']);
            }
        } else {
            echo json_encode(['modal' => View::make('users.add_modal')->render()]);
        }
    }

    public function delete(Request $request, int $id)
    {
        if ($request->has('delete')) {
            if ($id) {
                (new Users())->deleteUser($id);
                echo json_encode(['error' => 0, 'result' => 'Пользователь успешно удален']);
            } else {
                echo json_encode(['error' => 1, 'result' => 'Ошибка']);
            }
        } else {
            $data = [
                'users' => (new Users())->getUser($id)
            ];
            echo json_encode(['modal' => View::make('users.delete_modal', $data)->render()]);
        }
    }

    public function edit(Request $request, int $id)
    {
        if ($request->has('edit')) {
            $error = [];
            if (!$request->input('name')) {
                $error[] = 'Укажите ФИО!';
            }
            if (!$request->input('age')) {
                $error[] = 'Укажите Возраст!';
            }
            if (!$request->input('gender')) {
                $error[] = 'Укажите пол!';
            }

            if ($error) {
                $result = [
                    'error' => 1,
                    'result' => implode("<br />", $error)
                ];
                echo json_encode($result);
            } else {
                (new Users())->editUser($request, $id);
                echo json_encode(['error' => 0, 'result' => 'Пользователь успешно отредактирован']);
            }
        } else {
            $currentUser = (new Users())->getUser($id);
            $data = [
                'users' => $currentUser
            ];
            echo json_encode(['modal' => View::make('users.edit_modal', $data)->render()]);
        }
    }
}