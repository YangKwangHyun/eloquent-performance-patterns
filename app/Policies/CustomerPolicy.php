<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;

class CustomerPolicy
{
    public function view(User $user, Customer $customer)
    {
        // 만약 $user가 소유자이거나 $user가 $customer의 sales_rep_id와 같다면 true를 반환합니다.
        return $user->is_owner || $user->id === $customer->sales_rep_id;
    }
}
