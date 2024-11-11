<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Requests\AddRequest;

class AddController extends Controller
{
    public function __invoke(AddRequest $request)
    {
       
        try {
            $validatedData = $request->validated();
            // Сохраняем изображение и получаем путь
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('profile_image', 'public');
                $validatedData['profile_image'] = $imagePath;
            Product::create($validatedData);

            
                }

            // Перенаправление с сообщением об успешном сохранении
            return redirect()->route('list.index')->with('success', 'Данные успешно сохранены!');
        } catch (\Exception $e) {
            // Если ошибка, то перенаправляем с сообщением об ошибке
            return redirect()->back()->withErrors($e->getMessage());
        }

 

   
   
    
    
    }
}




//   // Сохранение изображения, если оно загружено
//      if ($request->hasFile('profile_image')) {
//         $imagePath = $request->file('profile_image')->store('profile_image', 'public');
//        // $validatedData['profile_image'] = $imagePath;
//     }


//          Product::create([
//     'name' => $request['name'],
//     'processor' =>  $request['processor'],
//     'memory_capacity' =>  $request['memory_capacity'],
//     'disk_capacity' => $request['disk_capacity'],
//     'video_card' => $request['video_card'],
//     'weight' => $request['weight'],
//     'price' => $request['price'],
//     'profile_image' => $imagePath,
//     'count' => $request['count'],
// ]);