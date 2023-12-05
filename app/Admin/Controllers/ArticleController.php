<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Article;


class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'article';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function grid()
    {
        
        $table = new grid(new Article);

        $table->column('id', 'id')->sortable();
        $table->column('title', 'title');
        $table->column('subtitle', 'subtitle');
        $table->column('author', 'author');
        $table->column('content', 'content');
        // $table->column('thumb', 'thumb')->image();;
        $table->column('created_at', 'create_time');
        return $table;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->field('id', 'id');
        $show->field('title', 'title');
        $show->field('subtitle', 'subtitle');
        $show->field('author', 'author');
        $show->field('content', 'content');
        // $show->field('thumb', 'thumb')->image();;
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);
        $form->text('title');
        $form->text('subtitle');
        $form->text('author');
        $form->textarea('content')->rows(10);
        // $form->add(Field::image('thumb', 'thumb'));

        // $form->image('thumb');
        return $form;
    }
}
