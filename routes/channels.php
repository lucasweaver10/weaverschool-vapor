<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('test-events', function (User $user, int $userId) {
    // Your authorization logic here (if needed)
    return true;  // No authentication required, it's public now
});

Broadcast::channel('text-responses.{userId}', function (User $user, int $userId) {
    return $user->id === $userId;
});
