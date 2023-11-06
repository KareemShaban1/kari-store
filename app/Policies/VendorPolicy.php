<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        //
        return $admin->hasAbility('vendors.view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, Vendor $vendor)
    {
        //
        return $admin->hasAbility('vendors.view');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        //
        return $admin->hasAbility('vendors.create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Vendor $vendor)
    {
        //
        return $admin->hasAbility('vendors.update');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Vendor $vendor)
    {
        //
        return $admin->hasAbility('vendors.delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Vendor $vendor)
    {
        //
        return $admin->hasAbility('vendors.restore');

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Vendor $vendor)
    {
        //
        return $admin->hasAbility('vendors.forceDelete');

    }
}