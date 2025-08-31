<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();

        // ✅ التحقق من البيانات
        $data = $request->validate([
            'name' => 'sometimes|string',
            'phone' => 'sometimes|string',
            'address' => 'sometimes|string|nullable',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // ✅ التعامل مع الصورة الجديدة
        if ($request->hasFile('image')) {
            $oldPath = public_path('assets/images/' . $user->image);
            if (file_exists($oldPath) && $user->image !== 'user.png') {
                unlink($oldPath);
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images'), $fileName);
            $data['image'] = $fileName;
        }

        $user->update($data);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $this->formatUser($user),
        ]);
    }

    private function formatUser($user)
    {
        return [
            'id'      => $user->id,
            'name'    => $user->name,
            'phone'   => $user->phone,
            'address' => $user->address,
       
            'image'   => $user->image 
                ? asset('assets/images/' . $user->image)
                : asset('assets/images/user.png'),
        ];
    }
}
    