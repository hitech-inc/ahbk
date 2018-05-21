<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

/**
 * Class Category
 * @package App\Models
 * @version May 3, 2018, 5:57 am UTC
 *
 * @property string title
 * @property string slug
 * @property integer parent_id
 * @property string text
 * @property string img
 */
class Category extends Model
{
    use SoftDeletes;
    use NodeTrait;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'slug',
        'parent_id',
        'text',
        'img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'parent_id' => 'integer',
        'text' => 'string',
        'img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'slug' => 'required'
    ];

    public static function select() 
    {
        $res = self::withDepth()->having('depth', '=', 0)->get();

        return ['' => 'Верхний уровень'] + $res->pluck('title', 'id')->all();
    }

    public static function getProduct()
    {
        $product = self::where('img', '!=', null)->first();
        return $product->img;
    }

    // public static function getCategories()
    // {
    //     $categories = Category::withDepth()->having('depth', '=', 0)->get();
    //     $categories = Category::all();
    //     $children = $categories->children;
    //     dd($children);
    //     return $categories;      
    // }

    // public static function getChildrens($categories)
    // {
    //     $categories = Category::whereSlug($categories)->first();
    //     $children = $categories->children;
    //     dd($children);
    //     return $children;
    // }

    public static function getCategories()
    {
        // Пустой массив
        $res = [];
        // Получаю категории у которых parent_id = null
        $categories = self::withDepth()->having('depth', '=', 0)->get();
        //dd($categories);
        foreach ($categories as $category) 
        {
            // Пустой массив для детей
            $children = [];

            // если у $category есть дети то делаем код ниже
            if ($category->hasChildren())
            {
                // В переменную $categorys получем детей обращаясь к объекту $category и к его свойству descendants, которую предаставляем библиотека nestedset. В переменной $categorys будет коллекция детей
                $categorys = $category->descendants;
                //dd($categorys);

                // Делаю пеменную для детей, обращаемся к объекту $categorys в котором есть дети, и у него вызываем метод pluck который извлекает все значения коллекции по указанным ключам. Т.е. в этом случае извлечет у $categorys значения по полям title, и slug. И таким образом в перемнной $children будет массив детей.
                $children = $categorys->pluck('title', 'slug')->all();
                //dd($category);
            }

            // В массив $res вставляем $category и обращаемся к id категории, далее делаем ассоциативный массив и в нем делаю ключ категорий и в него сохраняю коллекцию категорий, далее ключ детей и в него сохраняю массив детей.
            $res[$category->id] = [
                'category' => $category,
                'children' => $children
            ];
        }

        //dd($res);
        return $res;      
    }
}
