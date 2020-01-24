<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Lmts\src\controller\LmtsApi;

class ParecerPolicy
{
    use HandlesAuthorization;
    private $api;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->api = new LmtsApi();
    }

    public function parecerCapr(?User $user){
      return $this->api->autorizar('parecer capr');
    }

    public function parecerCge(?User $user){
      return $this->api->autorizar('parecer cge');
    }

    public function parecerCpga(?User $user){
      return $this->api->autorizar('parecer cpga');
    }

    public function reabrirPpc(?User $user){
      return $this->api->autorizar('reabrir ppc');
    }
}
