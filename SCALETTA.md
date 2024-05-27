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

## (1)fill the ProjectSeeder as you prefer (in this example I will use Faker) + (2)fill the DatabaseSeeder and then (3)run a single Migration for both 

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



    
   
