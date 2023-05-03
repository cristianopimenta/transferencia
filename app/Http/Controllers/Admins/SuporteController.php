<?php

namespace App\Http\Controllers\Admins;

use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuporteRequest;
use App\Models\Suporte;
use App\Services\SuporteServices;
use Illuminate\Http\Request;

class SuporteController extends Controller
{
    public function __construct(
        protected SuporteServices $service
    ) {
    }
    public function index(Request $request)
    {

        $suportes = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter,
           
        );
        // $suportes = Suporte::paginate();
        // {{ $suportes->links() }}

        return view('admins/suportes/index', compact('suportes'));
    }

    public function create()
    {
        return view('admins/suportes/create');
    }

    public function store(StoreSuporteRequest $request, Suporte $suporte)
    {

        // $data = $request->validate();
        // $data['status'] = 'A';

        //  $suporte->create($data);

        $this->service->new(CreateSuporteDTO::makeFromRequest($request));

        return redirect()->route('suportes.index');
    }

    public function show(string $id)
    {

        if (!$suporte = $this->service->findOne($id)) {
            return back();
        };

        return view('admins/suportes/show', compact('suporte'));
    }

    public function edit(string $id)
    {
        // if (!$suporte = Suporte::where('id', $id)->first()) {
        if (!$suporte = $this->service->findOne($id)) {
            return back();
        }

        return view('admins/suportes/edit', compact('suporte'));
    }

    public function update(string|int $id, Suporte $suporte, StoreSuporteRequest $request)
    {

        $this->service->update(UpdateSuporteDTO::makeFromRequest($request));
        if (!$suporte) {
            return back();
        }

        //  $suporte->update($request->validate());

        return redirect()->route('suportes.index');
    }

    public function destroy(string $id)
    {

        //   if (!$suporte = Suporte::find($id)) {        
        //    return back();
        //  }

        $this->service->delete($id);

        // $suporte->delete();
        return redirect()->route('suportes.index');
    }
}
