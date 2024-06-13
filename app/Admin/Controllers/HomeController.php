<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FuncionarioController;
use OpenAdmin\Admin\Admin;
use \App\Models\Funcionario;
use OpenAdmin\Admin\Controllers\Dashboard;
use OpenAdmin\Admin\Layout\Column;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Layout\Row;


class HomeController extends Controller
{
    public function index(Content $content)
    {
        $dados = Funcionario::select('tp_funcionario_id')->get();
        
        $values = $dados->pluck('tp_funcionario_id')->toArray();


        return $content
            ->css_file(Admin::asset("open-admin/css/pages/dashboard.css"))
            ->title('Dashboard')
            ->row(Dashboard::title())
            ->row(function (Row $row) use ($values) {
                $row->column(5, function (Column $column) use ($values) {
                    $column->row('<canvas id="myChart"></canvas>');
                });
            })
            ->body($this->chartScript($values));
    }

    protected function chartScript($values)
    {
         $values_json = json_encode($values);

        return <<<SCRIPT
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: $values_json,
                    datasets: [{
                        label: 'Funcionários',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        SCRIPT;
    }
}
