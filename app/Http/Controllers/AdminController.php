<?php

namespace App\Http\Controllers;

use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $mes_atual;
    private $ano_atual;
    private $storage_path;

    public function construct()
    {
        $this->storage_path = $this->storage_path ('app/public/anexos/');
        $this->mes_atual = Carbon::now('America/Rio_Branco')->month;
        $this->ano_atual = Carbon::now('America/Rio_Branco')->year;
    }

    public function search(Request $request)
    {
        $termo = $request->pesquisa;
        $mes_atual = $this->mes_atual;

    }
    public function store(Request $request)
    {
        $item = new Item();
        $validade=$request->validate([
            'numero'     => 'required|unique:itens,numero,NULL,id,deleted_at,NULL',
            'divulgacao' => 'required|date_format:d/m/Y',
            'anexo'      => 'required',
        ]);

        $request->divulgacao = date('Y-m-d', strtotime(str_replace('/', '-', $request->divulgacao)));

        $filename = 'DEMPAC' . $request->numero . str_replace('-', '', $request->divulgacao);
        $filepath = $request->anexo->storeAs('public/anexos', $filename.'.pdf');
        $completepath = $this->storage_path . $filename . '.pdf';

        $item = new Item;
        $item->numero     = $request->numero;
        $item->divulgacao = $request->divulgacao;
        $item->divulgacao = $item->divulgacao->addHours(8);
        $item->created_by = \Auth::id();
        $item->file       = $filepath;
        $item->save();

        return redirect('admin')->withSuccess('Registro inserido com sucesso');
    }
}
