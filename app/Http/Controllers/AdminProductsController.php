<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\Product;

class AdminProductsController extends Controller
{
    public function call_admin_cart_add()
    {
        return view('admin.add_products_table');
    }

    public function call_admin_cart_add_product(Request $request) // Método para gaurdar datos de producto
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'code' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // En este caso, el archivo puede tener hasta 10 MB (10240 KB) 
            ],  [
                'name.required' => 'El campo de título es obligatorio.',
                'description.required' => 'El campo de descripción es obligatorio.',
                'code.required' => 'El campo de código es obligatorio.',
                'price.required' => 'El campo de precio es obligatorio.',
                'price.numeric' => 'El campo de precio debe ser un número.',
                'image.required' => 'El campo de imagen es obligatorio.',
                'image.image' => 'El archivo debe ser una imagen válida.',
                'image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif.',
                'image.max' => 'El tamaño de la imagen es muy pesado (solo se admite un tamaño máximo de hasta 10MB).',
            ]);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Obtener el archivo
                $image = $request->file('image');

                // Generar un nombre único para la imagen
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('img_server/'); // Ruta de destino en public/images/products

                // Asegúrate de que la carpeta exista
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true); // Crea la carpeta si no existe
                }
    
                // Mover la imagen a la carpeta destino dentro de public
                $image->move($destinationPath, $imageName);
    
                // Obtener la URL pública correcta
                $imageUrl = asset('img_server/' . $imageName);

                // Crear el producto en la base de datos
                $data_products = Product::create([
                    'name' => $validatedData['name'],
                    'description' => $validatedData['description'],
                    'code' => $validatedData['code'], 
                    'price' => $validatedData['price'],
                    'image' => $imageUrl, // Guardamos la URL generada
                ]);
            } else {
                return redirect()->back()->with('message', 'No se pudo cargar la imagen.')->with('partialsMessage', 'error');
            }

            return redirect()->route('admin.cart.add')->with('message', 'Producto agregado correctamente.')->with('partialsMessage', 'ok');
        } catch (ValidationException $exception) {
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }
    }

      
      public function call_admin_cart_delete_product(Request $request)// Método para eliminar un producto
      {
          $product = Product::find($request->id);// Buscar el producto en la base de datos
  
          if ($product) {
              // Eliminar la imagen asociada del almacenamiento, si existe
              if ($product->image) {
                  // Aquí se elimina la imagen del directorio 'public/image_products'
                  $imagePath = str_replace('storage/', 'public/', $product->image); // Convertir la URL en la ruta del archivo
                  if (Storage::exists($imagePath)) {
                      Storage::delete($imagePath); // Eliminar la imagen
                  }
              }
  
              // Eliminar el producto de la base de datos
              $product->delete();
  
              // Redirigir con mensaje de éxito
              return redirect()->route('admin.form.products')->with('message', 'Producto eliminado correctamente.')->with('partialsMessage', 'ok');
          } else {
              // Si no se encuentra el producto, mostrar un error
              return redirect()->back()->with('message', 'Producto no encontrado.')->with('partialsMessage', 'error');
          }
      }
}
