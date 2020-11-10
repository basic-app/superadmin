<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\SuperAdmin;

use BasicApp\SuperAdmin\Events\UsersEvent;
use BasicApp\SuperAdmin\Config\SuperAdmin as SuperAdminConfig;

class SuperAdminEvents extends \CodeIgniter\Events\Events
{

    const EVENT_USERS = 'ba:superAdmin:users';

    public static function onUsers($callback)
    {
        return static::on(static::EVENT_USERS, $callback);
    }

    public static function users()
    {
        $config = config(SuperAdminConfig::class);

        assert($config ? true : false, SuperAdminConfig::class);

        $event = new UsersEvent([get_object_vars($config)]);

        $event->trigger(static::USERS_EVENT);

        return $event->users;
    }

}