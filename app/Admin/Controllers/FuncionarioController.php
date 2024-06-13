<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Funcionario;
use OpenAdmin\Admin\Layout\Content;
use App\Models\tp_funcionario;
use App\Models\DadosPessoais;
use App\Admin\Controllers\EstagiarioController;
use \App\Models\Estagiario;
use \App\Models\Terceirizados;
use \App\Models\Cursos;
use \App\Models\Faculdades;
use \App\Models\Endereco;
use Encore\Admin\Widgets\Form as WidgetsForm;



class FuncionarioController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Funcionário';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {    
        $grid = new Grid(new Funcionario());
        
    
       
        $grid->column('id_funcionario', __('Id funcionario'));
        $grid->column('nome', __('Nome'))->filter();
        $grid->column('email', __('Email'));
        $grid->column('rg', __('Rg'));
        $grid->column('cpf', __('Cpf'));
        $grid->column('tipofuncionario.tipo', __('Tipo de funcionario'));
        $grid->column('usuario', __('Usuario'));
        $grid->column('cracha', __('Cracha'));
        $grid->column('ramal', __('Ramal'));
        $grid->column('dadospessoais.nome_pai', __('Nome do pai'));
        

        
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
        $show = new Show(Funcionario::findOrFail($id));

        
        $show->field('id_funcionario', __('Id funcionario'));
        $show->field('nome', __('Nome'));
        $show->field('email', __('Email'));
        $show->field('rg', __('Rg'));
        $show->field('cpf', __('Cpf'));
        $show->field('tipofuncionario.tipo', __('Tipo de funcionario'));
        $show->field('usuario', __('Usuario'));
        $show->field('cracha', __('Cracha'));
        $show->field('ramal', __('Ramal'));

        $show->divider();

        $show->field('dadosPessoais.nome_pai', __('Nome do Pai'));
        $show->field('dadosPessoais.nome_mae', __('Nome da Mãe'));
        $show->field('dadosPessoais.telefone', __('Telefone'));
        $show->field('dadosPessoais.celular', __('Celular'));
        $show->field('dadosPessoais.emergencia', __('Emergência'));
        $show->field('dadosPessoais.recado', __('Recado'));
         
        $show->divider();

        $show->field('endereco.cep', __('CEP'))->attribute('id', 'endereco-cep');
        $show->field('endereco.rua', __('Rua'))->attribute('id','endereco-rua');
        $show->field('endereco.bairro', __('Bairro'))->attribute('id','endereco-bairro');
        $show->field('endereco.cidade', __('Cidade'))->attribute('id','endereco-cidade');
        $show->field('endereco.numero', __('Número'));
        $show->field('endereco.complemento', __('Complemento'));
       
        return $show;
    }

   

    /**
     * Make a form builder.
     * 
     * 
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Funcionario());
        
        // Adicione os campos do formulário de funcionário

        $form->text('nome', __('Nome'))->autofocus();
        $form->email('email', __('Email'));
        $form->text('rg', __('Rg'));
        $form->text('cpf', __('Cpf'));
        $form->text('usuario', __('Usuario'));
        $form->text('cracha', __('Cracha'));
        $form->text('ramal', __('Ramal'));
        $form->text('setor', __('Setor'));

        // Salvar os dados na tabela dados_pessoais
        $form->html('<h4>Dados Pessoais</h4>');
        $form->text('dadosPessoais.nome_pai', __('Nome do Pai'));
        $form->text('dadosPessoais.nome_mae', __('Nome da Mãe'));
        $form->text('dadosPessoais.telefone', __('Telefone'));
        $form->text('dadosPessoais.celular', __('Celular'));
        $form->text('dadosPessoais.emergencia', __('Emergência'));
        $form->text('dadosPessoais.recado', __('Recado'));

         // Salvar os daods na tabela endereco
        $form->html('<h4>Endereço</h4>');
        $form->text('endereco.cep', __('CEP'))->attribute('id', 'endereco-cep')->rules('required|min:8',[
            'min'   => 'O campo deve ter no mínimo :min caracteres.',
       ]);

        $form->text('endereco.rua', __('Rua'))->attribute('id','endereco-rua');
        $form->text('endereco.bairro', __('Bairro'))->attribute('id','endereco-bairro');
        $form->text('endereco.cidade', __('Cidade'))->attribute('id','endereco-cidade');
        $form->text('endereco.numero', __('Número'));
        $form->text('endereco.complemento', __('Complemento'));

        $opcoesTipoFuncionario = [
            1 => 'Servidor',
            2 => 'Estagiário',
            3 => 'Terceirizado'
        ];

        $form->radioCard('tp_funcionario_id','Tipo de funcionário')
            ->options($opcoesTipoFuncionario)
            ->when(3, function (Form $form){
                $form->text('terceirizados.name', __('Nome'));
                $form->text('terceirizados.rg', __('Rg'));

            })->when(2, function (Form $form){
                // Se o tipo de funcionário for Estagiário, inclua campos relacionados a estagiários
                $form->date('estagiario.dt_inicio', 'Data Inicio')->format("dddd, MMMM Do YYYY");
                $form->date('estagiario.dt_termino', 'Data Fim')->format('d-m-Y');
                $curso = cursos::pluck('nome', 'id_curso')->toArray();
                $form->select('estagiario.id_curso', __('Curso'))->options(['' => 'Selecione o curso'] + $curso);
                $faculdade = faculdades::pluck('nome', 'id_faculdade')->toArray();
                $form->select('estagiario.id_faculdade', __('Faculdade')) ->options(['' => 'Selecione uma faculdade'] + $faculdade);
                $form->radio('estagiario.renovar', 'Renovar')->options([1 =>'Sim', 0 =>'Não']);
                $form->date('estagiario.inicio', 'Inico')->format('d-m-Y');
                $form->date('estagiario.termino', 'Termino')->format('d-m-Y');
            });
            
        return $form;
    }

}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
     // Seleciona o campo de CEP
     var cepInput = document.getElementById('endereco-cep');

    // Adiciona um evento de "blur" ao campo de CEP
    cepInput.addEventListener('blur', function() {
    // Obtém o valor do CEP digitado pelo usuário
    var cep = this.value.replace(/\D/g, '');

    // Verifica se o CEP possui 8 dígitos
        if (cep.length === 8) {
           // Faz a requisição GET para a API ViaCEP
            fetch('https://viacep.com.br/ws/' + cep + '/json/')
            .then(response => response.json())
            .then(data => {
            // Verifica se a resposta da API possui um erro
             if (!data.erro) {
                // Preenche automaticamente os campos de rua, bairro e cidade
                document.querySelector('#endereco-rua').value = data.logradouro;
                document.querySelector('#endereco-bairro').value = data.bairro;
                 document.querySelector('#endereco-cidade').value = data.localidade;
                } else {
                     // Limpa os campos de rua, bairro e cidade se o CEP não for válido
                    document.querySelector('#endereco-rua').value = '';
                    document.querySelector('#endereco-bairro').value = '';
                     document.querySelector('#endereco-cidade').value = '';
                     }
            })
            .catch(error => {
             console.error('Erro ao consultar o CEP:', error);
         });
        }
     });
 });
 </script>           