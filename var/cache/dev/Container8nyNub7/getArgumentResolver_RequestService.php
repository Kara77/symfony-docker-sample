<?php

namespace Container8nyNub7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getArgumentResolver_RequestService extends App_KernelDevContainer
{
    /*
     * Gets the private 'argument_resolver.request' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['argument_resolver.request'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver();
    }
}
