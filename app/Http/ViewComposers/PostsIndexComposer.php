<?php
    
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Post as PostEloquent;
use App\Type as TypeEloquent;

class PostsIndexComposer
{
    public function compose(View $view){
        $post_types = TypeEloquent::orderBy('name', 'ASC')->get();
        $posts_total = PostEloquent::get()->count();
        
        $view->with('post_types', $post_types);
        $view->with('posts_total', $posts_total);
    }
}