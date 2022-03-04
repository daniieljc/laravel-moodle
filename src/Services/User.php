<?php

namespace Daniieljc\LaravelMoodle\Services;

use Daniieljc\LaravelMoodle\Entities\User as UserItem;
use Daniieljc\LaravelMoodle\Entities\Dto\User as UserDto;
use Daniieljc\LaravelMoodle\Entities\UserCollection;

/**
 * Class User
 * @package Daniieljc\LaravelMoodle\Services
 */
class User extends Service
{
    /**
     * Get all users
     * @return UserCollection
     */
    public function getAll()
    {
        $arguments = [
            'courseid' => '1',
        ];
        $response = $this->sendRequest('core_enrol_get_enrolled_users', $arguments);
        return $this->getUserCollection($response);
    }

    /**
     * Get user by field
     * @param $field
     * @param $value
     * @return UserCollection
     */
    public function getByField($field, $value)
    {
        $arguments = [
            'criteria' => [
                [
                    'key' => $field,
                    'value' => $value,
                ],
            ],
        ];
        $response = $this->sendRequest('core_user_get_users', $arguments);

        return $this->getUserCollection($response['users']);
    }

    /**
     * Create new user
     * @param \Daniieljc\LaravelMoodle\Entities\Dto\User[] ...$usersDto
     * @return UserCollection
     */
    public function create(UserDto ...$usersDto)
    {
        $users = $this->prepareEntityForSending(...$usersDto);
        $response = $this->sendRequest(
            'core_user_create_users',
            [
                'users' => $users
            ]
        );

        $users = array_map(function ($response, $user) {
            return array_merge($response, $user);
        }, $response, $users);

        return $this->getUserCollection($users);
    }

    /**
     * Update user
     * @param \Daniieljc\LaravelMoodle\Entities\Dto\User[] ...$usersItem
     * @return UserCollection
     */
    public function update(UserItem ...$usersItem)
    {
        $users = $this->prepareEntityForSending(...$usersItem);

        $response = $this->sendRequest(
            'core_user_update_users',
            [
                'users' => $users
            ]
        );

        return $response;
    }

    /**
     * Delete users by ids
     * @param array $ids
     * @return mixed
     */
    public function delete(array $ids = [])
    {
        $response = $this->sendRequest('core_user_delete_users', ['userids' => $ids]);

        return $response;
    }

    /**
     * Get user collection by user array
     * @param array $users
     * @return UserCollection
     */
    protected function getUserCollection(array $users)
    {
        $userItems = [];

        foreach ($users as $index => $userItem) {
            $userItems[] = new UserItem($userItem);
        }

        return new UserCollection(...$userItems);
    }


    /**
     * Enrol as Student
     * @param $id_user
     * @param array $courses
     * @return mixed
     */
    public function enrolStudent($id_user, $courses)
    {
        $data = array();
        foreach ($courses as $course) {
            $data[] = [
                'roleid' => 5,
                'userid' => $id_user,
                'courseid' => $course,
            ];
        }

        $arguments = [
            'enrolments' => $data,
        ];
        $response = $this->sendRequest('enrol_manual_enrol_users', $arguments);

        return $response;
    }

}
