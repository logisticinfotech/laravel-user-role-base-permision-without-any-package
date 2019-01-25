<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## How to handle different type of user role in laravel without any packages?

There are lots of package available for restrict role based user permission. But if you don’t want to use package and complexity then create custom middleware and we can handle many role easily.

- **We can create custom middleware by php artisan command:**
	
	php artisan make:middleware CheckRole

Above command will create new file checkRole inside your app/Http/Middleware folder.

we must register middleware in app/Http/Kernel.php class otherwise it will give error our middleware class not found.


Ex:
	protected $routeMiddleware = [
        'checkRole' => \App\Http\Middleware\CheckRole::class,
 	];


 - **generate table by below command:**
    php artisan migrate

- **create user seeder by below command:**
    php artisan make:seeder UsersTableSeeder

- **insert users by below command:**
    php artisan db:seed

Demo user:
**Admin**
    Email:user@admin.com
    Password:123456
**Manager**
    Email:user@manager.com
    Password:123456
**Employee**
    Email:user@employee.com
    Password:123456


- **Handle multiple user role below code:**

```
public function handle($request, Closure $next,$role='')
{

        $userRole=$request->user();

        if($userRole && $userRole->count()>0)
        {
            $userRole=$userRole->role;
            $checkRole=0;
            if($userRole==$role && $role=='admin')
            {
                $checkRole=1;
            }
            elseif($userRole==$role && $role=='manager')
            {
                $checkRole=1;
            }
            elseif($userRole==$role && $role=='employee')
            {
                $checkRole=1;
            }
            
            if($checkRole==1)
                return $next($request);
            else
               return abort(401);
        }
        else
        {
            return redirect('login');
        }
}
```

[You can check full detail about it. you can open our blog](https://github.com/logisticinfotech/laravel-user-role-base-permision-without-any-package).
