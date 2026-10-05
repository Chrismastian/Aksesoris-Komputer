<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Keyboard;
use App\Models\Mouse;
use App\Models\Headset;
use App\Models\Monitor;
use App\Models\Storage;
class AdminController extends Controller
{
    //



    function index()
    {
        return view('admin.index', [
            'recentOrders' => Order::with('items')->latest()->take(5)->get(),
            'revenue'     => (int) Order::whereIn('status', ['paid', 'shipped'])->sum('total'),
            'pending'     => Order::where('status', 'pending')->count(),
        ]);
    }

    public function orders()
    {
        return view('admin.orders', [
            'orders' => Order::with('items')->latest()->paginate(15),
        ]);
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,paid,shipped,cancelled'],
        ]);

        Order::findOrFail($id)->update($validated);

        return back()->with('success', 'Status pesanan diperbarui.');
    }
    public function keyboard()
{
    $data_keyboard = Keyboard::all();
    return view('admin.keyboard', [
        'data_keyboard' => $data_keyboard
    ]);
}
    public function tambah_keyboard()
    {
        return view('admin.tambah_keyboard');
    }
    public function edit_keyboard($id)
    {
        $data_keyboard = Keyboard::find($id);
        return view('admin.edit_keyboard', [
            'data_keyboard' => $data_keyboard
        ]);
    }
    public function update_keyboard(Request $request, $id)
    {
        $data_keyboard = Keyboard::find($id);
        $data_keyboard->nama = $request->nama;
        $data_keyboard->harga = $request->harga;
        $data_keyboard->gambar = $request->gambar;
        $data_keyboard->save();
        return redirect('/admin/keyboard');
    }
    public function hapus_keyboard($id)
    {
        $data_keyboard = Keyboard::find($id);
        $data_keyboard->delete();
        return redirect('/admin/keyboard');
    }

    public function simpan_keyboard(Request $request)
    {
        $data_keyboard = new Keyboard();
        $data_keyboard->nama = $request->nama;
        $data_keyboard->harga = $request->harga;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images'), $gambar);
            $data_keyboard->gambar = $gambar;
        }
        $data_keyboard->save();
        return redirect('/admin/keyboard');
    }
    public function mouse()
{
    $data_mouse = Mouse::all();
    return view('admin.mouse', [
        'data_mouse' => $data_mouse
    ]);
}
    public function tambah_mouse()
    {
        return view('admin.tambah_mouse');
    }
    public function edit_mouse($id)
    {
        $data_mouse = Mouse::find($id);
        return view('admin.edit_mouse', [
            'data_mouse' => $data_mouse
        ]);
    }
    public function update_mouse(Request $request, $id)
    {
        $data_mouse = Mouse::find($id);
        $data_mouse->nama = $request->nama;
        $data_mouse->harga = $request->harga;
        $data_mouse->gambar = $request->gambar;
        $data_mouse->save();
        return redirect('/admin/mouse');
    }
    public function hapus_mouse($id)
    {
        $data_mouse = Mouse::find($id);
        $data_mouse->delete();
        return redirect('/admin/mouse');
    }

    public function simpan_mouse(Request $request)
    {
        $data_mouse = new Mouse();
        $data_mouse->nama = $request->nama;
        $data_mouse->harga = $request->harga;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images'), $gambar);
            $data_mouse->gambar = $gambar;
        }
        $data_mouse->save();
        return redirect('/admin/mouse');
    }
    public function Headset()
{
    $data_headset = Headset::all();
    return view('admin.headset', [
        'data_headset' => $data_headset
    ]);
}
    public function tambah_headset()
    {
        return view('admin.tambah_headset');
    }
    public function edit_headset($id)
    {
        $data_headset = Headset::find($id);
        return view('admin.edit_headset', [
            'data_headset' => $data_headset
        ]);
    }
    public function update_headset(Request $request, $id)
    {
        $data_headset = Headset::find($id);
        $data_headset->nama = $request->nama;
        $data_headset->harga = $request->harga;
        $data_headset->gambar = $request->gambar;
        $data_headset->save();
        return redirect('/admin/headset');
    }
    public function hapus_headset($id)
    {
        $data_headset = Headset::find($id);
        $data_headset->delete();
        return redirect('/admin/headset');
    }

    public function simpan_headset(Request $request)
    {
        $data_headset = new Headset();
        $data_headset->nama = $request->nama;
        $data_headset->harga = $request->harga;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images'), $gambar);
            $data_headset->gambar = $gambar;
        }
        $data_headset->save();
        return redirect('/admin/headset');
    }
    public function monitor()
{
    $data_monitor = Monitor::all();
    return view('admin.monitor', [
        'data_monitor' => $data_monitor
    ]);
}
    public function tambah_monitor()
    {
        return view('admin.tambah_monitor');
    }
    public function edit_monitor($id)
    {
        $data_monitor = Monitor::find($id);
        return view('admin.edit_monitor', [
            'data_monitor' => $data_monitor
        ]);
    }
    public function update_monitor(Request $request, $id)
    {
        $data_monitor = Monitor::find($id);
        $data_monitor->nama = $request->nama;
        $data_monitor->harga = $request->harga;
        $data_monitor->gambar = $request->gambar;
        $data_monitor->save();
        return redirect('/admin/monitor');
    }
    public function hapus_monitor($id)
    {
        $data_monitor = Monitor::find($id);
        $data_monitor->delete();
        return redirect('/admin/monitor');
    }

    public function simpan_monitor(Request $request)
    {
        $data_monitor = new Monitor();
        $data_monitor->nama = $request->nama;
        $data_monitor->harga = $request->harga;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images'), $gambar);
            $data_monitor->gambar = $gambar;
        }
        $data_monitor->save();
        return redirect('/admin/monitor');
    }
    public function storage()
{
    $data_storage = Storage::all();
    return view('admin.storage', [
        'data_storage' => $data_storage
    ]);
}
    public function tambah_storage()
    {
        return view('admin.tambah_storage');
    }
    public function edit_storage($id)
    {
        $data_storage = Storage::find($id);
        return view('admin.edit_storage', [
            'data_storage' => $data_storage
        ]);
    }
    public function update_storage(Request $request, $id)
    {
        $data_storage = Storage::find($id);
        $data_storage->nama = $request->nama;
        $data_storage->harga = $request->harga;
        $data_storage->gambar = $request->gambar;
        $data_storage->save();
        return redirect('/admin/storage');
    }
    public function hapus_storage($id)
    {
        $data_storage = Storage::find($id);
        $data_storage->delete();
        return redirect('/admin/storage');
    }

    public function simpan_storage(Request $request)
    {
        $data_storage = new Storage();
        $data_storage->nama = $request->nama;
        $data_storage->harga = $request->harga;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images'), $gambar);
            $data_storage->gambar = $gambar;
        }
        $data_storage->save();
        return redirect('/admin/storage');
    }
}
