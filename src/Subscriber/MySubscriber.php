<?php declare(strict_types=1);

namespace MNLogMailVariables\Subscriber;

use Shopware\Core\Content\MailTemplate\Service\Event\MailBeforeValidateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MySubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        // Return the events to listen to as array like this:  <event to listen to> => <method to execute>
        return [
            MailBeforeValidateEvent::class => 'mailBeforeSent'
        ];
    }

    public function mailBeforeSent(MailBeforeValidateEvent $event)
    {
        $data = $event->getTemplateData();
        error_log(print_r($data, true)."\n", 3, getcwd().'/error.log');
    }
}