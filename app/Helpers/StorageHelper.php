<?php
namespace App\Http\Controllers;

use App\User as User;

function public_storage_path(User $user)
{
  return storage_path().'/app/public/'.$user->id;
}






 ?>
