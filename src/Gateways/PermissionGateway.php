<?php namespace Acoustep\EntrustGui\Gateways;

use Acoustep\EntrustGui\Repositories\PermissionRepository;
use Illuminate\Config\Repository as Config;
use Illuminate\Events\Dispatcher;

/**
 * This file is part of Entrust GUI,
 * A Laravel 5 GUI for Entrust.
 *
 * @license MIT
 * @package Acoustep\EntrustGui
 */
class PermissionGateway extends ManyToManyGateway
{

    /**
     * Create a new gateway instance.
     *
     * @param Config $config
     * @param PermissionRepository $repository
     * @param Dispatcher $dispatcher
     *
     * @return void
     */
    public function __construct(Config $config, PermissionRepository $repository, Dispatcher $dispatcher)
    {
      parent::__construct($config, $repository, $dispatcher, 'permission', 'roles', 'roles');
    }

}
