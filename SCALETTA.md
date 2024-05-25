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



    
   
