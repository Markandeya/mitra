<?php
namespace Mitra\Http\Controllers;

use Mitra\User as User;

function public_storage_path(User $user)
{
  return storage_path().'/app/public/'.$user->id;
}






 ?>
