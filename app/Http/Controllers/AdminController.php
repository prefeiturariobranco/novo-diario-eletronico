<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\ItemEdit;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Smalot\PdfParser\Parser;
use Exception;

class AdminController extends Controller
{
    private $mes_atual;
    private $ano_atual;
    private $storage_path;

    public function construct()
    {
        $this->storage_path = $this->storage_path('app/public/anexos/');
        $this->mes_atual = Carbon::now('America/Rio_Branco')->month;
        $this->ano_atual = Carbon::now('America/Rio_Branco')->year;
    }

    /**
     * @throws \Exception
     */
    public function search(Request $request)
    {
        $termo = $request->pesquisa;
        $mes_atual = $this->mes_atual;
        $itens = Item::where('', $termo)->get();

        // Parse pdf file and build necessary objects.
        $parser = new Parser();
        $pdf = $parser->parseFile($itens);

        // Retrieve all details from the pdf file.
        $details = $pdf->getDetails();

        // Loop over each property to extract values (string or array).
        foreach ($details as $property => $value) {
            if (is_array($value)) {
                $value = implode(', ', $value);
            }
            echo $property . ' => ' . $value . "\n";
        }

        $view = (auth()->id() ? 'admin.index' : 'home');
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

    public function store(AdminRequest $request)
    {
        try {
            DB::beginTransaction();

            $filepath = $request->file->store('anexos');
            $item = new Item;
            $item->number = $request->number;
            $item->disclosure = date_format(date_create($request->disclosure), 'd/m/Y H:m:s');
            $item->created_by = \Auth::id();
            $item->file = $filepath;
            $item->save();

            DB::commit();
            return redirect('admin')->withSuccess('Registro cadastrado com sucesso');

        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors([
                'message' => $ex->getMessage()
            ]);
        }

    }

    public function edit($id)
    {
        $mes_atual = $this->mes_atual;
        $item = Item::findOrfail($id);

        return view('admin.edit', compact('item', 'mes_atual'));
    }

    public function update(ItemEdit $request, $id)
    {
        try {
            DB::beginTransaction();
            $item = Item::findOrfail($id);
            if (isset($request->anexo)) $item->file = $request->anexo->store('anexos');
            if (!is_null($request->disclosure)) $item->disclosure = $request->disclosure;
            $item->updated_by = \Auth::id();
            $item->update();
            DB::commit();
            return redirect()->route('admin.index')->withSuccess('Registro alterado com sucesso');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }

    }

    public function destroy($id)
    {
        if (Item::where('id', $id)->delete()) {
            $json['delete'] = true;
            $json['redirect'] = route('admin.index');
            $json['message'] = 'Edital removido com sucesso!';
            return response()->json($json);
        }

        $json['error'] = true;
        $json['message'] = 'Não foi possível excluir o edital. Favor, tente novamente!';
        return response()->json($json);
    }
}
