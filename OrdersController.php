<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Orders;
use App\detail_Orders;
use App\User;
use App\Profil;
use App\DataPengiriman;
use App\Products;
use Auth;
class OrdersController extends Controller
{

  function __construct()
  {

  }

  public function get()
  {
    $orders=[];
    foreach (Orders::all() as $o) {
      $detail = [];
        "id_order" => $d->id_order,
        "id_product" => $d->id_product,
        "quantity" => $d->quantity
      ];
      array_push($detail, $itemDetail);
    }
    $item = [
      "id_order" => $o->id,
      "id_user" => $o->id_user,
      "id_address" => $o->id_address,
      "total" => $o->total,
      "bukti_bayar" => $o->bukti_bayar,
      "status" => $o->status,
    ];
    array push($order,$item);
  }
  return respone(["order" =>])

  public function find(Request $request)
  {
    $find = $request->find;
    $orders = Orders::where("id","like","%$find%")->orWhere("name","like","%$find%")
    ->orWhere("price","like","%$find%")->orWhere("description","like","%$find%")->get();
    return response([
      "orders" => $orders
    ])\name;
        $orders->stock= $request->stock;
        $orders->price = $request->price;
        $orders->description = $request->description;

        if($request->file('image')){
          $file = $request->file('image');
          $name = $file->getClientOriginalName();
          $file->move(\base_path() ."/public/images", $name);
          $orders->image = $name;
        }

    $orders->save();



        return response(["message" => "Data produk berhasil ditambahkan"]);
      } catch (\Exception $e) {
        return response(["message" => $e->getMessage()]);
      }
    }else if($action == "update"){
      try {
        $orders = Orders::where("id", $request->id)->first();
        $orders->name = $request->name;
        $orders->stock = $request->stock;
        $orders->price = $request->price;
        $orders->description = $request->description;
        if($request->file('image')){
          $file = $request->file('image');
          $name = $file->getClientOriginalName();
          $file->move(\base_path() ."/public/images", $name);
          $orders->image = $name;
        }
        $orders->save();
        return response(["message" => "Data produk berhasil diubah"]);
      } catch (\Exception $e) {
        return response(["message" => $e->getMessage()]);
      }
    }
  }

  public function drop($id)
  {
    try {
      Orders::where("id", $id)->delete();
      return response(["message" => "Data produk berhasil dihapus"]);
    } catch (\Exception $e) {
      return response(["message" => $e->getMessage()]);
    }
  }
}
 ?>
