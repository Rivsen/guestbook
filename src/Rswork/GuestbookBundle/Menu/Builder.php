<?php

namespace Rswork\GuestbookBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function navTabs( FactoryInterface $factory, array $options )
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild( 'Message List', array( 'route' => 'guestbook' ) );
        $item = $menu->addChild( 'Create Message', array( 'route' => 'guestbook_new' ) );

        return $menu;
    }
}
