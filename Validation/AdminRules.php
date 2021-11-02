<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Admin\Validation;

use BasicApp\Admin\Config\Admin as AdminConfig;
use Webmozart\Assert\Assert;

class AdminRules
{

    public function validAdmin($value, $reserved, array $data, &$error = null) : bool
    {
        if (empty($data['password']) || empty($data['username']))
        {
            return true;
        }

        $config = config(AdminConfig::class);

        if (!$config || !$config->username)
        {
            $error = lang('Username not found in application config.');
        
            return false;
        }

        if (!$config || !$config->password)
        {
            $error = lang('Password not defined in application config.');
        
            return false;
        }

        if (($data['username'] != $config->username) || ($data['password'] != $config->password))
        {
            $error = lang('User not found or password incorrect.');

            return false;
        }

        return true;
    }

}