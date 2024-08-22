<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::whereNull('parent_id')->orderBy('order')->with('children')->get();
        return view('menus.index', compact('menus'));
    }

    public function edit()
    {
        // Obtén los menús principales y sus submenús
        $menus = Menu::whereNull('parent_id')->orderBy('order')->with('children')->get();
        return view('menus.edit', compact('menus'));
    }

    public function updateOrder(Request $request)
    {
        // Obtén la estructura serializada del menú desde la solicitud
        $menuOrder = $request->input('order');
        // Recorre la estructura y actualiza cada elemento en la base de datos
        $this->updateMenuOrder($menuOrder, null);

        return response()->json(['status' => 'success', 'message' => 'Menu order updated successfully!']);
    }

     private function updateMenuOrder($items, $parentId)
    {
        foreach ($items as $index => $item) {
            $menu = Menu::find($item['id']);
            $menu->parent_id = $parentId;
            $menu->order = $index;
            $menu->save();

            if (isset($item['children'])) {
                $this->updateMenuOrder($item['children'], $menu->id);
            }
        }
    }
}
