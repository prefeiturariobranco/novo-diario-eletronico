<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $mes_atual;
    private $ano_atual;


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


        $anos = DB::table('items')
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->get()
            ->map(function ($item) {
                return $item->year;
            });

        if (!$anos->contains($this->ano_atual)) {
            $anos[] = $this->ano_atual;
        }

        $now = Carbon::now('America/Rio_Branco');
        $mes_atual = $this->mes_atual;
        $mes_filtro = $request->has('mes') ? $request->input('mes') : $this->mes_atual;
        $ano_filtro = $request->has('ano') ? $request->input('ano') : $this->ano_atual;

        return view('home', compact('itens'))
            ->with('anos', $anos)
            ->with('now', $now)
            ->with('mes_atual', $mes_atual)
            ->with('mes_filtro', $mes_filtro)
            ->with('ano_filtro', $ano_filtro);

    }

    public function show(Item $item)
    {
        $file = substr($item->file, strrpos($item->file, '/') + 1);

        return view('view', compact('file'));
    }
}
