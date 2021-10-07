<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;

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

        $itens = Item::search($termo)->get();

        $view = (auth()->id() ? 'admin.index' : 'home' );
        return view($view, compact('itens', 'mes_atual', 'termo'));

    }

    public function index()
    {
        $mes_atual = $this->mes_atual;
        $itens = Item::orderBy('disclosure')->get();

        return view('admin.index', compact('itens', 'mes_atual'));
    }

    public function create()
    {
        $mes_atual = $this->mes_atual;

        return view('admin.create', compact('mes_atual'));
    }

    public function store(Request $request)
    {
//        $request->disclosure = date('Y-m-d', strtotime(str_replace('/', '-', $request->disclosure)));

        $date =  $_POST['divulgacao'];
        $request->disclosure  = date("m/d/Y", strtotime($date));

        $filename = 'DEMPAC' . $request->number . str_replace('-', '', $request->disclosure);
        $filepath = $request->anexo->store('anexos');
        $completepath = $this->storage_path . $filename . '.pdf';

        $item = new Item;
        $item->number     = $request->number;
        $item->disclosure = $request->disclosure ;
        $item->created_by = \Auth::id();
        $item->file       = $filepath;
        $item->save();


        return redirect('admin')->withSuccess('Registro cadastrado com sucesso');

    }

    public function edit(Item $item)
    {
        $mes_atual = $this->mes_atual;

        return view('admin.edit', compact('item', 'mes_atual'));
    }

    public function update(Request $request, Item $item)
    {
        $date =  $_POST['divulgacao'];
        $request->disclosure  = date("m/d/Y", strtotime($date));

        if ($request->anexo) {
            $filename = 'DEMPAC' . $request->numero . str_replace('-', '', $request->divulgacao);
            $filepath = $request->anexo->storeAs('public/anexos', $filename . '.pdf');
            $completepath = $this->storage_path . $filename . '.pdf';
            $item->file = $filepath;
        }

        $item->number     = $request->number;
        $item->disclosure = $request->disclosure;


        $item->updated_by = \Auth::id();

        $item->update();

        return redirect('admin')->withSuccess('Registro alterado com sucesso');
    }

    public function delete(Item $item)
    {
        $item = Item::find($item->id);
        $item->delete();

        if ($item->delete()) {
            return redirect('admin')->withSuccess('Registro deletado com sucesso');
        }
    }
}
