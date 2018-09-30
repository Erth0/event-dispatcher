<?php 
use App\Models\User;
use App\Core\Events\Dispatcher;
use App\Events\User\UserSignedIn;
use App\Listeners\User\SendSignInEmail;
use App\Listeners\User\UpdateLastSignInDate;


require 'vendor/autoload.php';

$user = new User;
$user->id = 1;
$user->email = 'e.mukja@icloud.com';

$dispatcher = new Dispatcher;

$dispatcher->addListener('UserSignedIn', new SendSignInEmail());
$dispatcher->addListener('UserSignedIn', new UpdateLastSignInDate());

$dispatcher->dispatch(new UserSignedIn($user));