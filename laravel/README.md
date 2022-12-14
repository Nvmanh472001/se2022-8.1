# SHOP WEB

## START WEB ADMIN

### 1 Create Database Name "Shop"
### 2 Start 
#### 2.1 Start Server
`php artisan serve`
#### 2.2 Migration
`php artisan migrate`
#### 2.3 Create Role 
`php artisan db:seed --class=CreateRoleSeeder`
#### 2.4 Create User Admin 
`php artisan db:seed --class=CreateUserAdminSeeder`
#### 2.5 Create Permission 
`php artisan db:seed --class=CreatePermissionSeeder`
#### 2.6 Create Role  - Permission
`php artisan db:seed --class=CreateRolePermissionSeeder`
#### 2.6 Create Role  - User
`php artisan db:seed --class=CreateRoleUserSeeder`

Done
>email: admin@mail.com

>password: Admin123