<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyboard;
use App\Models\Mouse;
use App\Models\Headset;
use App\Models\Monitor;
use App\Models\Storage;

class UserProductController extends Controller
{
    /**
     * Halaman utama user - menampilkan semua kategori produk
     */
    public function index()
    {
        $keyboards  = Keyboard::latest()->take(4)->get();
        $mouses     = Mouse::latest()->take(4)->get();
        $headsets   = Headset::latest()->take(4)->get();
        $monitors   = Monitor::latest()->take(4)->get();
        $storages   = Storage::latest()->take(4)->get();

        return view('user.index', compact(
            'keyboards', 'mouses', 'headsets', 'monitors', 'storages'
        ));
    }

    /**
     * Halaman daftar Keyboard
     */
    public function keyboard(Request $request)
    {
        $query = Keyboard::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(8);
        $category = 'Keyboard';

        return view('user.products', compact('products', 'category'));
    }

    /**
     * Halaman daftar Mouse
     */
    public function mouse(Request $request)
    {
        $query = Mouse::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(8);
        $category = 'Mouse';

        return view('user.products', compact('products', 'category'));
    }

    /**
     * Halaman daftar Headset
     */
    public function headset(Request $request)
    {
        $query = Headset::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(8);
        $category = 'Headset';

        return view('user.products', compact('products', 'category'));
    }

    /**
     * Halaman daftar Monitor
     */
    public function monitor(Request $request)
    {
        $query = Monitor::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(8);
        $category = 'Monitor';

        return view('user.products', compact('products', 'category'));
    }

    /**
     * Halaman daftar Storage
     */
    public function storage(Request $request)
    {
        $query = Storage::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(8);
        $category = 'Storage';

        return view('user.products', compact('products', 'category'));
    }

    /**
     * Halaman detail produk
     */
    public function show($category, $id)
    {
        $modelMap = [
            'keyboard' => Keyboard::class,
            'mouse'    => Mouse::class,
            'headset'  => Headset::class,
            'monitor'  => Monitor::class,
            'storage'  => Storage::class,
        ];

        abort_unless(isset($modelMap[$category]), 404);

        $product      = $modelMap[$category]::findOrFail($id);
        $categoryName = ucfirst($category);

        // Produk lain dari kategori yang sama (rekomendasi)
        $related = $modelMap[$category]::where('id', '!=', $id)->latest()->take(4)->get();

        return view('user.detail', compact('product', 'categoryName', 'related', 'category'));
    }
}
