<?php

use App\Database\DB;

if (inRequest('remove')) {
    DB::remove(request('activityId'));
    redirectTo('home');
}

