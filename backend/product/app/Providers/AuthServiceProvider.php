<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineGateCategory();
        $this->defineGateMenu();
        $this->defineGateOrder();
        $this->defineGateUser();
        $this->defineGatePermission();
        $this->defineGateProduct();
        $this->defineGateRole();
        $this->defineGateSlide();



    }
    public function defineGateCategory()
    {
        //Phân quyền Category
        Gate::define('category_list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category_add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category_edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category_delete', 'App\Policies\CategoryPolicy@forceDelete');
        Gate::define('category_delete', 'App\Policies\CategoryPolicy@delete');
        Gate::define('category_restore', 'App\Policies\CategoryPolicy@restore');
    }
    public function defineGateUser()
    {
        //Phân quyền User
        Gate::define('user_list', 'App\Policies\UserPolicy@view');
        Gate::define('user_add', 'App\Policies\UserPolicy@create');
        Gate::define('user_edit', 'App\Policies\UserPolicy@update');
        Gate::define('user_deleteforcus', 'App\Policies\UserPolicy@forceDelete');
        Gate::define('user_delete', 'App\Policies\UserPolicy@delete');
        Gate::define('user_restore', 'App\Policies\UserPolicy@restore');
    }
    public function defineGateMenu()
    {
        //Phân quyền Menu
        Gate::define('menu_list', 'App\Policies\MenuPolicy@view');
        Gate::define('menu_add', 'App\Policies\MenuPolicy@create');
        Gate::define('menu_edit', 'App\Policies\MenuPolicy@update');
        Gate::define('menu_delete', 'App\Policies\MenuPolicy@forceDelete');
        Gate::define('menu_delete', 'App\Policies\MenuPolicy@delete');
        Gate::define('menu_restore', 'App\Policies\MenuPolicy@restore');
    }
    public function defineGateOrder()
    {
        //Phân quyền Order
        Gate::define('order_list', 'App\Policies\OrderPolicy@view');
        Gate::define('order_add', 'App\Policies\OrderPolicy@create');
        Gate::define('order_edit', 'App\Policies\OrderPolicy@update');
        Gate::define('order_delete', 'App\Policies\OrderPolicy@forceDelete');
        Gate::define('order_delete', 'App\Policies\OrderPolicy@delete');
        Gate::define('order_restore', 'App\Policies\OrderPolicy@restore');
    }
    public function defineGateProduct()
    {
        //Phân quyền Product
        Gate::define('product_list', 'App\Policies\ProductPolicy@view');
        Gate::define('product_add', 'App\Policies\ProductPolicy@create');
        Gate::define('product_edit', 'App\Policies\ProductPolicy@update');
        Gate::define('product_deleteforcus', 'App\Policies\ProductPolicy@forceDelete');
        Gate::define('product_delete', 'App\Policies\ProductPolicy@delete');
        Gate::define('product_restore', 'App\Policies\ProductPolicy@restore');

    }
    public function defineGateSlide()
    {
        //Phân quyền Slide
        Gate::define('slider_list', 'App\Policies\SlidePolicy@view');
        Gate::define('slider_add', 'App\Policies\SlidePolicy@create');
        Gate::define('slider_edit', 'App\Policies\SlidePolicy@update');
        Gate::define('slider_delete', 'App\Policies\SlidePolicy@forceDelete');
        Gate::define('slider_delete', 'App\Policies\SlidePolicy@delete');
        Gate::define('slider_restore', 'App\Policies\SlidePolicy@restore');
    }
    public function defineGateRole()
    {
        //Phân quyền Role
        Gate::define('role_list', 'App\Policies\RolePolicy@view');
        Gate::define('role_add', 'App\Policies\RolePolicy@create');
        Gate::define('role_edit', 'App\Policies\RolePolicy@update');
        Gate::define('role_delete', 'App\Policies\RolePolicy@forceDelete');
        Gate::define('role_delete', 'App\Policies\RolePolicy@delete');
        Gate::define('role_restore', 'App\Policies\RolePolicy@restore');
    }
    public function defineGatePermission()
    {
        //Phân quyền Permission
        Gate::define('permission_list', 'App\Policies\PermissionPolicy@view');
        Gate::define('permission_add', 'App\Policies\PermissionPolicy@create');
        Gate::define('permission_edit', 'App\Policies\PermissionPolicy@update');
        Gate::define('permission_delete', 'App\Policies\PermissionPolicy@forceDelete');
        Gate::define('permission_delete', 'App\Policies\PermissionPolicy@delete');
        Gate::define('permission_restore', 'App\Policies\PermissionPolicy@restore');
    }
}
