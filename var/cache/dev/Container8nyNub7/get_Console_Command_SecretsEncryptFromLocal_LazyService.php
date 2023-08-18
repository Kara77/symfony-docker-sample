<?php

namespace Container8nyNub7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Console_Command_SecretsEncryptFromLocal_LazyService extends App_KernelDevContainer
{
    /*
     * Gets the private '.console.command.secrets_encrypt_from_local.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.console.command.secrets_encrypt_from_local.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('secrets:encrypt-from-local', [], 'Encrypt all local secrets to the vault', false, #[\Closure(name: 'console.command.secrets_encrypt_from_local', class: 'Symfony\\Bundle\\FrameworkBundle\\Command\\SecretsEncryptFromLocalCommand')] fn (): \Symfony\Bundle\FrameworkBundle\Command\SecretsEncryptFromLocalCommand => ($container->privates['console.command.secrets_encrypt_from_local'] ?? $container->load('getConsole_Command_SecretsEncryptFromLocalService')));
    }
}
