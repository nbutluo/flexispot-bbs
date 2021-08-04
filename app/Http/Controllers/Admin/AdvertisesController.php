<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\Base64ImageHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertiseRequest;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertisesController extends Controller
{
    public function index()
    {
        $advertises = Advertise::paginate(10);

        return view('admin.advertises.index', compact('advertises'));
    }

    public function edit(Advertise $advertise)
    {
        return view('admin.advertises.edit', compact('advertise'));
    }

    public function update(AdvertiseRequest $request, Advertise $advertise, Base64ImageHandler $base64handler)
    {
        $data = $advertise->fill($request->all());

        // dda($data);
        // 判断封面图是否有修改过
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $data['cover'][0], $result)) {
            $res = $base64handler->base64_image_content($request->cover, 'cover');
            $data['cover'] = $res;
        } else {
            $data['cover'] = $data['cover'][0];
        }

        $advertise->save();
        return redirect()->route('admin.advertises.index')->with('success', '更新成功');
    }
}
