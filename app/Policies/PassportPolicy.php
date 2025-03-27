<?php

namespace App\Policies;

use App\Models\Passport;
use App\Models\User;

class PassportPolicy
{
    // Проверка на просмотр паспорта
    public function view(User $user, Passport $passport)
    {
        return $user->id === $passport->user_id;
    }

    // Проверка на редактирование паспорта
    public function update(User $user, Passport $passport)
    {
        return $user->id === $passport->user_id;
    }

    // Проверка на удаление паспорта
    public function delete(User $user, Passport $passport)
    {
        return $user->id === $passport->user_id;
    }
}
