<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
use BasicApp\Config\Events\ValidationEvent;

ValidationEvent::on(function(ValidationEvent $event) {

    $event->ruleSets[] = \BasicApp\Admin\Validation\AdminRules::class;

});