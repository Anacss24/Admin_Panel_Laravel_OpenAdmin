<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Terceirizados;

class TerceirizadoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Terceirizados';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Terceirizados());
     

        $grid->column('id_funcionario', __('Id funcionario'));
        $grid->column('name', __('Nome'));
        $grid->column('email', __('Email'));
        $grid->column('rg', __('Rg'));
        $grid->column('cpf', __('Cpf'));
        $grid->column('funcionario.tp_funcionario_id', __('Tipo de funcionario'));
        $grid->column('usuario', __('Usuario'));
        $grid->column('cracha', __('Cracha'));
        $grid->column('ramal', __('Ramal'));
        $grid->column('created_at', __('Created at'))->dateFormat('d-m-Y');
        $grid->column('updated_at', __('Updated at'))->dateFormat('d-m-Y');
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Terceirizados::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('rg', __('Rg'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Terceirizados());

        $form->text('name', __('Name'));
        $form->text('rg', __('Rg'));

        return $form;
    }
}
