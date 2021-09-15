<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $mes_atual;

    public function __construct()
    {
        $this->middleware('auth');

        $this->mes_atual = Carbon::now('America/Rio_Branco')->month;
        $this->ano_atual = Carbon::now('America/Rio_Branco')->year;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $now = Carbon::now();
        $ano_filtro = $request->has('ano') ? $request->ano : $this->ano_atual;
        $mes_filtro = $request->has('mes') ? $request->mes : $this->mes_atual;

        $itens = Item::where('disclosure', '<=', $now)
            ->whereMonth('disclosure', '=', $mes_filtro)
            ->whereYear('disclosure', '=', $ano_filtro)
            ->orderBy('disclosure', 'desc')
            ->get();

        return view('home', compact('itens'));
    }

    public function show(Item $item)
    {
        $file = substr($item->file, strrpos($item->file, '/') + 1);

        return view('view', compact('file'));
    }
}
