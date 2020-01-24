<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Lmts\src\controller\LmtsApi;

class CoordenadorPolicy
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

  public function abrirPpc(?User $user){
    return $this->api->autorizar('abrir ppc');
  }

  public function novaVersaoPpc(?User $user){
    return $this->api->autorizar('nova versao ppc');
  }

  public function reabrirPpc(?User $user){
    return $this->api->autorizar('reabrir ppc');
  }
}
