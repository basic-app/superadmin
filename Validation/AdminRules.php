<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\SuperAdmin\Validation;

use BasicApp\SuperAdmin\Config\Admin as AdminConfig;
use Webmozart\Assert\Assert;

class AdminRules
{

    public function validAdmin($value, $reserved, array $data, &$error = null) : bool
    {
        if (empty($data['password']) || empty($data['username']))
        {
            return true;
        }

        $config = config(SuperAdminConfig::class);

        if (!$config)
        {
            Assert::notEmpty($config, 'Config not found.');
        }

        if (!$config->username)
        {
            $error = lang('Username not defined in config.');
        
            return false;
        }

        if (!$config->password)
        {
            $error = lang('Password not defined in config.');
        
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