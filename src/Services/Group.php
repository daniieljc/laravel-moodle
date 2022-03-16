<?php

namespace Daniieljc\LaravelMoodle\Services;

/**
 * Class Group
 * @package Daniieljc\LaravelMoodle\Services
 */
class Group extends Service
{
    /**
     * @param $course
     * @return array
     */
    public function getCourseGroups($course)
    {
        return $this->sendRequest('core_group_get_course_groups', ['courseid' => $course]);
    }

    /**
     * @param $groups
     * @return array
     */
    public function getUsersGroup($groups)
    {
        return $this->sendRequest('core_group_get_group_members', [
            'groupids' => [$groups]
        ]);
    }
}
