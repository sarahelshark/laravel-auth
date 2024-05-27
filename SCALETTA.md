# Start a new project in Laravel

## setup of laravel & auth 
```bash
//laravel setup + auth code (wip)
```

## create a new model with artisan command
```bash
php artisan make:model Project -mcrsR

//migration, controller (controller type = resource), seeder , form requests for validation
```

## follow the migration link and customize the table's rows 
```php

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name',200); 
            $table->string('cover_image')->nullable();
            $table->text('description')->nullable();
            $table->string('project_url')->nullable();
            $table->string('source_code_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

```

## (1) fill the ProjectSeeder as you prefer (in this example I will use Faker) + (2) fill the DatabaseSeeder and then (3)run a single Migration for both 

1. 
```php
//ProjectSeeder.php
namespace Database\Seeders;

use App\Models\Project; //import model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;  //import faker

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10 ; $i++) { 
            $project = new Project();//create new instance 
            $project->name = $faker->words(4, true);
            $project->cover_image= $faker->imageUrl(640,400,'Projects',true,$project->name, true, 'jpg');
            $project->description = $faker->paragraphs(5,true);
            $project->project_url = $faker->url();
            $project->source_code_url = $faker->url();
            $project->save();
        }
    }
}

```
2. 

```php
//Database.Seeder.php
namespace Database\Seeders;

use Database\Seeders\ProjectSeeder; //import my model's seeder 

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProjectSeeder::class
        ]);
    }
}

```
3. 
```bash
php artisan migrate --seed
```
! to see what is present in the db after the seed >>>
```bash
php artisan ti
Project::All()
```
...if the model is not found immediately, ctrl+c and try composer autoload, then run the previous command again
```bash
//alias of Project to see it faster 
composer dump-autoload
```



## since we created the Model, its migration, seeder and controller with the shortcut command "php artisan make:model Project -mcrsR", the ProjectController.php file will be generated directly in the Controllers folder, you shall put it in the Admin folder (remember to edit the namespace!)
```php
//ProjectController.php
namespace App\Http\Controllers\Admin; //edit namespace

use App\Models\Project; //import
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller; //import

```

## create a route for your new model in web.php
```php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectController; //import 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});  //http://localhost:8000/

Route::middleware(['auth','verified'])
->prefix('admin')  //  /admin
->name('admin.')//nome delle rotte es. admin.dashboard
->group(function(){
    //http://localhost:8000/admin
    Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard'); 
    
    //route dei posts 
    Route::resource('posts', PostController::class);

    //route dei projects
    Route::resource('projects', ProjectController::class);
        
}); 



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

```

## to see all 7 routes you've created for your CRUD operations, run the command:
```bash
php artisan route:list
```

##

##

##

# SCALETTA RELAZIONI 

## Create Migrations, Model, Controller, Seeder for Categories: 
```bash
php artisan make:model -mcrsR ModelName
```
### Define migration content:
```php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}
```
## Fill Seeder 
```php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=['programming','fullstack','backend','IoT','Cyber security'];

        foreach ($categories as $cat) {
            $category = new Category();
            $category->name = $cat;
            $category->slug = Str::slug($cat, '-');
            $category->save();
        }
    }
}
```
## execute migration + seeder
```bash
php artisan migrate
```

```bash
php artisan db:seed --class=CategorySeeder
```

## Add Foreign key from categories to posts

```bash
php artisan make:migration add_category_id_foreign_key_to_posts_table
```
## Follow the migration link "add_category_id_foreign_key_to_posts_table"

```php
public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            
            
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->nullOnDelete();
            //other option: ->onDelete('set null'); 
        });
    }

public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->dropForeign('posts_category_id_foreign');
            
            $table->dropColumn('category_id');
        });
    }

```



    
   
