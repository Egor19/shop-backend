<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Requests\AddRequest;
use App\Models\Categories;
use App\Models\TagProduct;
use App\Models\ColorProduct;
use Illuminate\Support\Facades\Storage;

class AddController extends Controller
{
    public function __invoke(AddRequest $request)
    {

        try {
            $validatedData = $request->validated();
            // Сохраняем изображение и получаем путь
            if ($request->hasFile('preview_image')) {
                $validatedData['preview_image'] = Storage::disk('public')->put('/image', $validatedData['preview_image']);
            }

//dd($validatedData);
            $tagsIds = $validatedData['tags'];
            $colorsIds = $validatedData['colors'];
            unset($validatedData['tags'], $validatedData['colors']);

            $product = Product::create($validatedData);

            foreach($tagsIds as $tagsId){
                TagProduct::firstOrCreate([
                    'product_id' => $product->id,
                    'tag_id' => $tagsId,
                ]);

            }

            foreach($colorsIds as $colorId){
                ColorProduct::firstOrCreate([
                    'product_id' => $product->id,
                    'color_id' => $colorId,
                ]);

            }


                // Обработка данных для Category
    

            
                

            // Перенаправление с сообщением об успешном сохранении
            return back()->with('success', 'Данные успешно сохранены!');

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