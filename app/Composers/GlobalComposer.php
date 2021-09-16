<?php

namespace App\Composers;

use Carbon\Carbon;
use Facade\Ignition\Exceptions\ViewExceptionWithSolution;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class GlobalComposer
{
    public $mes_atual;
    public $ano_atual;

    public function compose(View $view)
    {
        $this->mes_atual = Carbon::now('America/Rio_Branco')->month;
        $this->ano_atual = Carbon::now('America/Rio_Branco')->year;

        $anos = DB::table('items')
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->get()
            ->map(function ($item) {
                return $item->year;
            });

        if ( ! $anos->contains($this->ano_atual)) {
            $anos[] = $this->ano_atual;
        }

        $meses = [null, 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

        $now        = Carbon::now('America/Rio_Branco');
        $mes_atual  = $this->mes_atual;
        $mes_filtro = Request::has('mes') ? Request::input('mes') :  $this->mes_atual;
        $ano_filtro = Request::has('ano') ? Request::input('ano') : $this->ano_atual;

        $view->with('anos', $anos)
            ->with('meses', $meses)
            ->with('now', $now)
            ->with('mes_atual', $mes_atual)
            ->with('mes_filtro', $mes_filtro)
            ->with('ano_filtro', $ano_filtro);

    }

}
