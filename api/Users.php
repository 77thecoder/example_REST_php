<?php
require_once "Api.php";

class Users extends Api
{
    public $apiName = 'users';

    public function indexAction()
    {
        $allUsers = [
            'users' => [
                'Ivan',
                'Petr',
                'Sveta'
            ]
        ];

        return $this->response($allUsers, 200);
    }

    public function viewAction()
    {
        $id = array_shift($this->requestUri);

        if ($id && preg_match("/^\d+$/", $id)) {
            $user = [
                'name' => 'Ivan',
                'phone' => '495-123-00-12'
            ];

            return $this->response($user, 200);
        }

        return $this->response(Array("error" => "Wrong identifier specified"));
    }

    public function createAction()
    {
        return $this->response(Array("result" => "Created user, id = 12"), 200);
    }

    public function deleteAction()
    {
        $id = array_shift($this->requestUri);

        if ($id && preg_match("/^\d+$/", $id)) {
            return $this->response(Array("result" => "Deleted user id = {$id}"), 200);
        }

        return $this->response(Array("error" => "User with ID = {$id} not found"));
    }

    public function updateAction()
    {
        $id = array_shift($this->requestUri);

        if ($id && preg_match("/^\d+$/", $id)) {
            return $this->response(Array("result" => "Updated user id = {$id}"), 200);
        }

        return $this->response(Array("error" => "User with ID = {$id} not found"));
    }
}