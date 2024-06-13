<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Models\Estagiario;
use App\Models\Funcionario;
Use OpenAdmin\Admin\Admin;
use \App\Models\Cursos;
use \App\Models\Faculdades;
use App\Admin\Controllers\FuncionarioController;

class EstagiarioController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Estagiario';

    /**
     * Make a grid builder.
     * 
     *  Tela de listagem
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Estagiario());

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
        $show = new Show(Estagiario::findOrFail($id));

        $show->field('id_funcionario', __('Id_funcionario'));
        $show->field('id_estagio', __('Id_estagiário'));
        $show->field('funcionario.nome', __('Nome'));
        $show->field('funcionario.email', __('Email'));
        $show->field('funcionario.rg', __('Rg'));
        $show->field('funcionario.cpf', __('Cpf'));
        $show->field('funcionario.tp_funcionario_id', __('Tp funcionario'));
        $show->field('funcionario.usuario', __('Usuario'));
        $show->field('funcionario.cracha', __('Cracha'));
        $show->field('funcionario.ramal', __('Ramal'));

        
        return $show;

    }


      /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Estagiario());
               
               $form->text('funcionario.nome', __('Nome'));  

                $form->date('dt_inicio', 'Data Inicio');
                $form->date('dt_termino', 'Data Fim');
                $curso = cursos::pluck('nome', 'id_curso')->toArray();
                $form->select('id_curso', __('Curso'))->options(['' => 'Selecione o curso'] + $curso);
                $faculdade = faculdades::pluck('nome', 'id_faculdade')->toArray();
                $form->select('id_faculdade', __('Faculdade')) ->options(['' => 'Selecione uma faculdade'] + $faculdade);
                $form->radio('renovar', 'Renovar')->options([1 =>'Sim', 0 =>'Não']);
                $form->date('inicio', 'Inico');
                $form->date('termino', 'Termino');

        
        
        return $form;


    }




}
  


