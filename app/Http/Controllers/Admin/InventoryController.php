<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use App\Model\Inventory;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Location;
=======
use App\Model\Category;
use App\Model\Location;
use App\Model\Inventory;
use App\RelatedInventories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        $locations = Location::all();
        $inventories = Inventory::with('category', 'location')->get();
        return view('admin.inventory-mgt.inventory', compact('categories', 'locations', 'inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
<<<<<<< HEAD
        $input = $request->all();
=======

        $input =  $request->except(['related_inventories']);

>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
        // dd($input);
        $images = array();

        if ($files = $request->file('images')) {

            foreach ($files as $file) {

                $name = time() . $file->getClientOriginalName();

                $file->move('images', $name);

                $images[] = $name;
            }
        }
        // dd($images);
        $input['images'] = implode(',', $images);

        //  dd(implode(',',$images));

<<<<<<< HEAD
        Inventory::create($input);
=======
        $inventory = Inventory::create($input);
        $related_inventories = $request->related_inventories;
        // dd($related_inventories);
        for ($i = 0; $i < count($related_inventories); $i++) {
            RelatedInventories::create([
                'inventory_id' => $inventory->id,
                'related_product_id' => $related_inventories[$i],
            ]);
        }
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
        return back()->with('success', 'Inventory added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}