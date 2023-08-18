<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\EditClientRequest;
use App\Http\Requests\CreateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cpf = $request->query('cpf');
        $name = $request->query('name');
        $date_of_birth = $request->query('date_of_birth');
        $gender = $request->query('gender');
        $address = $request->query('address');
        $city = $request->query('city');
        $state = $request->query('state');

        $query = Client::query();

        if(!empty($cpf)){
            $query->where('cpf', 'like', '%'.$cpf.'%' );
        }
        if(!empty($name)){
            $query->where('name', 'like', '%'.$name.'%' );
        }
        if(!empty($date_of_birth)){
            $query->where('date_of_birth', '%'.$date_of_birth.'%' );
        }
        if(!empty($gender)){
            $query->where('gender', 'like','%'.$gender.'%' );
        }
        if(!empty($address)){
            $query->where('address', 'like', '%'.$address.'%' );
        }
        if(!empty($city)){
            $query->where('city', 'like', '%'.$city.'%' );
        }
        if(!empty($state)){
            $query->where('state', 'like','%'.$state.'%' );
        }

        $clients = $query->paginate(10);

        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $states = $clients->pluck('state')->unique()->sort();
        $cities = $clients->pluck('city')->unique()->sort();
        return view('clients.create', compact('states', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClientRequest $request)
    {
        $validatedData = $request->validated();

        $client = new Client($validatedData);
        $client->save();

        return redirect()->route('clients.index')
            ->with('success', 'Cliente criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        $states = Client::pluck('state')->unique()->sort();
        $cities = Client::pluck('city')->unique()->sort();

        return view('clients.edit', compact('client', 'states', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditClientRequest $request, $id)
    {
        $client = Client::findOrFail($id); // Encontre o cliente pelo ID

        $client->update([
            'cpf'           => $request->cpf,
            'date_of_birth' => $request->date_of_birth,
            'gender'        => $request->gender,
            'name'          => $request->name,
            'address'       => $request->address,
            'city'          => $request->city,
            'state'         => $request->state
        ]);

        return redirect()->route('clients.index')
        ->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        
        return redirect()
        ->route('clients.index')
        ->with('success', 'Cliente deletado com sucesso.');
    }
}
