<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $method = 'GET';
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $request->postaddress;

        $client = new Client();

        $options = [];

        try {
            $response = $client->request($method, $url, $options);
            $body = $response->getBody();
            $dataPre = json_decode($body, false);

            //dd($data->results[0]->zipcode);
            $data =[
                'postaddress' => $dataPre->results[0]->zipcode,
                'address' => $dataPre->results[0]->address1 . $dataPre->results[0]->address2 . $dataPre->results[0]->address3,
            ];

        } catch(\GuzzleHttp\Exception\ClientException $e) {
            return back();
        }

        return view('customers.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $customer = new Customer();
        $customer->fill($request->all());
        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Customer $customer)
    {
        $customer->fill($request->all());

        $customer->save();

        return view('customers.show', compact('customer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index');
    }
}
