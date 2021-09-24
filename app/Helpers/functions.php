<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

if (!function_exists('meses')){
    function meses(){
        $meses = [null, 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        return $meses;
    }
}

if (!function_exists('anos')){

    function anos(){
        $mes_atual = Carbon::now('America/Rio_Branco')->month;
        $ano_atual = Carbon::now('America/Rio_Branco')->year;

        $anos = DB::table('items')
            ->selectRaw('YEAR(disclosure) as year')
            ->groupBy('year')
            ->get()
            ->map(function ($item) {
                return $item->year;
            });

        if (!$anos->contains($ano_atual)) {
            $anos[] = $ano_atual;
        }

        return $anos;
    }
}


