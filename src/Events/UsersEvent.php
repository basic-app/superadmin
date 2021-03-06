<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\SuperAdmin\Events;

class UsersEvent extends \BasicApp\Event\BaseEvent
{

    public $users = [];

    public function __construct(array $users = [])
    {
        parent::__construct();

        $this->users = $users;
    }

}