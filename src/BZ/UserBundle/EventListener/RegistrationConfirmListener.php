<?php
/*
 * This file is part of the Speedwapp package.
 *
 * (c) Akambi Fagbohoun <contact@akambi-fagbohoun.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
namespace Speedwapp\UserBundle\EventListener;

/**
 * Redirect the user to login form after register success
 *
 * @author Jacques Adjahoungbo <tocicason@hotmail.fr>
 */

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RegistrationConfirmListener implements EventSubscriberInterface
{
    private $router;
    private $session;
    private $translator;
    private $container;
    public function __construct(UrlGeneratorInterface $router, Session $session, TranslatorInterface $translator, ContainerInterface $container)
    {
        $this->router = $router;
        $this->session = $session;
        $this->translator = $translator;
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess'
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        //TODO: Get username
        //$user = $this->container->get('security.context')->getToken()->getUser()
        //$username = ->getUsername();
        $userManager = $this->container->get('fos_user.user_manager');
        $username = $userManager->findUserByUsername($this->container->get('security.context')
                                ->getToken()->getUser());
        
        $this->session->getFlashBag()->add(
                'notice', 
                $this->translator->trans('registration.confirmed' ,array('%username%' => $username),'FOSUserBundle')
            );
        $url = $this->router->generate('speedwapp_frontend_homepage');
        $event->setResponse(new RedirectResponse($url));
    }
}