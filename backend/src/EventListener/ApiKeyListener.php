<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

final class ApiKeyListener
{
    public function __construct(
        public string $apiKey
    )
    {
    }

    #[AsEventListener(event: KernelEvents::REQUEST)]
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        $apiKey = $request->headers->get('Authorization');

        if($apiKey !== 'Bearer ' . $this->apiKey) {
            throw new AccessDeniedHttpException('Invalid API key');
        }
    }
}
