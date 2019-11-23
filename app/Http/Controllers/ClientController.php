<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all clients
        $clients = Client::get();
        // Return view index and pass variable clients
        return view('client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return view create new client
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        // Store new client
        Client::create($request->all());
        // Redirect to index page
        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
      // Find and pass variable client
      $client = Client::find($client->id);
      // return edit page
      return view('client.edit',compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
      // Find and update client
      Client::find($client->id)->update($request->all());
      // Redirect to index page after editing
      return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // Find and delete client
        Client::find($client->id)->delete();
        // Redirect to index page after deleting
        return redirect('client');
    }

    public function search(Request $request){
    // Get all results from search criteria
    $clients = Client::where('firstname', 'like', '%' . $request->sch . '%')->get();

    //save result to variable
    $res = '<table style="text-align:center" class="table table-flush dataTable">
    <tr>
    <th scope="col">#</th>
    <th scope="col">First name</th>
    <th scope="col">Last name</th>
    <th scope="col">Address</th>
    <th scope="col">Telephone</th>
    <th scope="col">Birthday</th>
    </tr>';
    foreach($clients as $client){
    $res.= '<tr>
      <th scope="row">'.$client->iteration.'</th>
      <td>'.$client->firstname.'</td>
      <td>'.$client->lastname.'</td>
      <td>'.$client->address.'</td>
      <td>'.$client->telephone.'</td>
      <td>'.$client->birthday.'</td>
    </tr>';
   }
   $res .= '</table>';

    //return variable
    return $res;
    }

    public function searchPage(){
      return view('client.search');
    }

}
