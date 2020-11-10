<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\SuperAdmin\Models;

use BasicApp\Auth\Interfaces\AuthModelInterface;
use BasicApp\SuperAdmin\SuperAdminEvents;

class SuperAdminModel implements AuthModelInterface
{

    const USERNAME_RULES = 'max_length[255]|min_length[2]';

    const PASSWORD_RULES = 'max_length[72]|min_length[5]';

    public $primaryKey = 'username';

    public $returnType = 'array';    

    public function findAll(bool $refresh = false)
    {
        static $users;

        if ($refresh || ($users === null))
        {
            $users = SuperAdminEvents::users();
        }

        return $users;
    }

    public function findByField($field, $value, bool $refresh = false)
    {
        foreach($this->findAll($refresh) as $id => $admin)
        {
            if (array_key_exists($field, $admin) && ($admin[$field] == $value))
            {
                return $admin;
            }
        }

        return null;
    }

    public function findByUsername(string $username, bool $refresh = false)
    {
        return $this->findByField('username', $username, $refresh);
    }

    public function find($id = null, bool $refresh = false)
    {
        return $this->findByField('username', $id, $refresh);
    }

    public function encodePassword($user, string $password) : string
    {
        return $password;
    }

    public function validatePassword($user, string $password) : bool
    {
        return $password == $user['password'];
    }

}