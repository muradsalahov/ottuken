<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\ProductDocs;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Goutte\Client;

class AdminProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('admin.products.index', compact('data'));
    }

    public function create()
    {
        $pgname = 'products';
        $data_brands = Brand::all();
        $data_company = Company::all();
        $data_category = Category::orderBy('categories.level', 'asc')->get();
        $product_last_id = Product::select('product_promo_code')->orderBy('created_at', 'desc')->first();
        return view('admin.products.create',compact('pgname','data_category','data_company','data_brands','product_last_id'));
    }

    public function edit($id)
    {
        $data = Product::find($id);
        $data_docs = ProductDocs::where('product_id', $data->id)->get();

        $data_brands = Brand::all();
        $data_company = Company::all();
        $data_category = Category::orderBy('categories.level', 'asc')->get();
        $data_subcategory = SubCategory::where('category_id', $data->category_id)->orderBy('sub_categories.level', 'asc')->get();
        $data_product_docs = ProductDocs::where('product_id', $data->id)->get();
        $pgname='product';
        return view('admin.products.edit', compact('pgname','data','data_docs','data_brands','data_company','data_category','data_subcategory','data_product_docs'));
    }

    public function update_product_single_data(Request $request,$id)
    {
        $data = Product::find($id);
        $input = $request->all();
        if($file = $request->file('product_main_photo')){
            if (file_exists(public_path() . '/assets_admin/product_image/' . $data->product_main_photo)) {
                unlink(public_path() . "/assets_admin/product_image/" . $data->product_main_photo);
            }
            $etc =  substr(($file->getClientOriginalName()), -4);
            $name = time() . '_main'.$etc;
            $file->move(public_path() . '/assets_admin/product_image', $name);
            $input['product_main_photo'] = $name;
        }
        $data->update($input);
        return redirect()->back()->with('message','Product Base data edited successfully');
    }

    public function admin_product_doc_update(Request $request,$id)
    {
        $data = ProductDocs::find($id);
        $input = $request->all();
        if($file = $request->file('updated_doc_photo')){
            if (file_exists(public_path() . '/assets_admin/product_docs_image/' . $data->product_doc_name)) {
                unlink(public_path() . "/assets_admin/product_docs_image/" . $data->product_doc_name);
            }
            $etc =  substr(($file->getClientOriginalName()), -4);
            $name = time() .'_doc_100'. $etc;
            $file->move(public_path() . '/assets_admin/product_docs_image', $name);
            $input['product_doc_name'] = $name;
        }
        $data->update($input);
        return redirect()->back()->with('message_doc_updated','Document updated successfully');
    }

    public function admin_product_doc_insert(Request $request,$id)
    {
        $inputs = $request->only(
            collect($request->all())->filter(function ($value, $key) {
                return strpos($key, 'doc_photo') === 0;
            })->keys()->toArray()
        );

        if ($inputs) {
            foreach ($inputs as $key => $value) {
                if ($file_doc = $request->file($key)) {
                    $etc =  substr(($file_doc->getClientOriginalName()), -4);
                    $name = time() .'_doc_'. $key.$etc;
                    $file_doc->move(public_path('assets_admin/product_docs_image'), $name);

                    $productDoc = new ProductDocs();
                    $productDoc->product_doc_name = $name;
                    $productDoc->product_id = $id;
                    $productDoc->save();
                }
            }
        }

        return redirect()->back()->with('message_doc_updated','Document entered successfullyy');
    }

    public function store(Request $request)
    {

        $data = $request->only('product_promo_code', 'company_id', 'category_id', 'subcategory_id', 'brand_id', 'product_link_id', 'product_url', 'product_name', 'description', 'product_price', 'product_price_number', 'product_comments', 'product_instock', 'product_rating', 'product_marketplace');
        

        if($file = $request->file('product_main_photo')){
            $etc =  substr(($file->getClientOriginalName()), -4);
            $name = time() . '_main'.$etc;
            $file->move(public_path() . '/assets_admin/product_image', $name);
            $data['product_main_photo'] = $name;
        }
        $last_id = Product::create($data)->id;

        $inputs = $request->only(
            collect($request->all())->filter(function ($value, $key) {
                return strpos($key, 'doc_photo') === 0;
            })->keys()->toArray()
        );

        if ($inputs) {
            foreach ($inputs as $key => $value) {
                if ($file_doc = $request->file($key)) {
                    $etc =  substr(($file->getClientOriginalName()), -4);
                    $name = time() .'_doc_'. $key.$etc;
                    $file_doc->move(public_path('assets_admin/product_docs_image'), $name);

                    $productDoc = new ProductDocs();
                    $productDoc->product_doc_name = $name;
                    $productDoc->product_id = $last_id;
                    $productDoc->save();
                }
            }
        }

        return redirect()->back()->with('message','Product and this Documents Added Successfully');

    }

    public function admin_product_doc_delete($id)
    {
        $data = ProductDocs::findOrFail($id);
        if (file_exists(public_path() . '/assets_admin/product_docs_image/' . $data->product_doc_name)) {
            unlink(public_path() . "/assets_admin/product_docs_image/" . $data->product_doc_name);
        }
        $data->delete();
        return redirect()->back()->with('message_doc_deleted','Document deleted successfully');
    }

    public function delete($id)
    {
        $data = Product::findOrFail($id);
        if (file_exists(public_path() . '/assets_admin/product_image/' . $data->product_main_photo)) {
            unlink(public_path() . "/assets_admin/product_image/" . $data->product_main_photo);
        }

        $docs = ProductDocs::where('product_id', $id)->get();

        foreach ($docs as $doc) {
            $image = $doc->product_doc_name;
            if (file_exists(public_path() . '/assets_admin/product_docs_image/' . $image)) {
                unlink(public_path() . '/assets_admin/product_docs_image/' . $image);
            }
        }
        
        $data->delete();
        return redirect()->back()->with('message','Company deleted successfully');
    }

    public function check_promo_code(Request $request)
    {
        $promo_code = $request->promo_code;
        $data = Product::where('product_promo_code', $promo_code)->exists();
        if ($data) {
            return response()->json(1);
        } else {
            return response()->json(0);
        }
    }

    private $results = array();
    public function get_ebay_data(Request $request)
    {
        $datas_ebay = array();
        $link = $request->url_link;
        $market_place = $request->marketplace_product;
        $client_ebay = new Client();

        $crawler_ebay = $client_ebay->request('GET', $link);
        $datas_ebay['product_name'] = $crawler_ebay->filter('span#vi-lkhdr-itmTitl')->text();
        $datas_ebay['product_price'] = $crawler_ebay->filter('.x-bin-price__content')->filter('.x-price-primary')->filter('span.ux-textspans')->text();
        if (($crawler_ebay->filter('.d-quantity__availability')->filter('span.ux-textspans')->count())>0) {
            $datas_ebay['stock_details'] = $crawler_ebay->filter('.d-quantity__availability')->filter('span.ux-textspans')->text();
        }else{
            $datas_ebay['stock_details'] = null;
        }
        if( ($crawler_ebay->filter('.fdbk-detail-list')->filter('div.tabs')->filter('div.tabs__items')->filter('div.tabs__item')->filter('span')->filter('span')->count())>0 ){
            $datas_ebay['feedback_count'] = $crawler_ebay->filter('.fdbk-detail-list')->filter('div.tabs')->filter('div.tabs__items')->filter('div.tabs__item')->filter('span')->filter('span')->text();
        }else{
            $datas_ebay['feedback_count'] = $crawler_ebay->filter('.fdbk-detail-list')->filter('h2.fdbk-detail-list__title')->filter('span.SECONDARY')->text();
        }
        
        if ($market_place=="US") {
            #US price
            $datas_ebay['product_price'] = substr($datas_ebay['product_price'], 3);
        }else{
            #EUROPE price
            $datas_ebay['product_price'] = substr($datas_ebay['product_price'], 3);
            $datas_ebay['product_price'] = str_replace(" ", "€", $datas_ebay['product_price']);
        }
        
        if (($crawler_ebay->filter('.progress-bar')->count())>0) {
            $data = array();
            $crawler_ebay->filter('.progress-bar')->each(function ($node) use (&$data) {
                array_push($data, $node->attr('value'));
            });
            //$data = array_filter($data);
            $datas_ebay['average_rating'] = array_sum($data)/count($data);
        }else{
            $datas_ebay['average_rating']='Yoxdu';
        }
        $datas_ebay['photo_ebay'] = $crawler_ebay->filter('.ux-image-carousel-item.active')->filter('img')->attr('src');
        return response()->json($datas_ebay);

    }

    public function admin_product_update_for_api($id)
    {
        $data = Product::find($id);
        $data_company_id = $data->company_id;
        $data_company_name = Company::findOrFail($data_company_id);
        if(strtolower($data_company_name->company_name) == 'amazon'){
            if(isset($data->product_link_id)){
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://axesso-axesso-amazon-data-service-v1.p.rapidapi.com/amz/amazon-lookup-product?url=".$data->product_url."",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 300,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: axesso-axesso-amazon-data-service-v1.p.rapidapi.com",
                        "X-RapidAPI-Key: 9e7edde96cmshef4f7ae33a8aa07p1ccfd4jsn9a84b20e19cd"
                    ],
                ]);
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err) {
                    $message = "Promo_code: ".$data->product_promo_code." Amazon update error: ".$err." ";
                    return redirect()->back()->with('message_error',$message);
                } else {
                    $response = json_decode($response);
                    $comment = $response->answeredQuestions;
                    function getFirstNumber($str) {
                        if (preg_match('/(\d+\.\d+)/', $str, $matches)) {
                            return (float) $matches[1];
                        } else {
                            return null;
                        }
                    }
                    $rating = getFirstNumber($response->productRating);
                    $stock = $response->warehouseAvailability;
                    if($data->product_marketplace == 'US'){
                        $price = '$'.$response->price;
                        $price_number = $response->price;
                    }else{
                        $price = '€'.$response->price;
                        $price_number = $response->price;

                    }
                    Product::where('id', $id)->update([
                        'product_price' => $price,
                        'product_price_number' => $price_number,
                        'product_comments' => $comment,
                        'product_rating' => $rating,
                        'product_instock' => $stock
                    ]);
                    $message = "Promo_code: ".$data->product_promo_code." Amazon product update successfully";
                    return redirect()->back()->with('message',$message); 
                }
            }else{
                return redirect()->back()->with('message_error','Product Id not found!');
            }
        }
        elseif (strtolower($data_company_name->company_name) == 'ebay') {
            if(isset($data->product_link_id)){
                $link = $data->product_url;
                $market_place = $data->product_marketplace;
                $client_ebay = new Client();

                $crawler_ebay = $client_ebay->request('GET', $link);
                $product_price = $crawler_ebay->filter('.x-bin-price__content')->filter('.x-price-primary')->filter('span.ux-textspans')->text();
                if (($crawler_ebay->filter('.d-quantity__availability')->filter('span.ux-textspans')->count())>0) {
                    $stock_details = $crawler_ebay->filter('.d-quantity__availability')->filter('span.ux-textspans')->text();
                }else{
                    $stock_details = "Null";
                }

                if( ($crawler_ebay->filter('.fdbk-detail-list')->filter('div.tabs')->filter('div.tabs__items')->filter('div.tabs__item')->filter('span')->filter('span')->count())>0 ){
                    $feedback_count = $crawler_ebay->filter('.fdbk-detail-list')->filter('div.tabs')->filter('div.tabs__items')->filter('div.tabs__item')->filter('span')->filter('span')->text();
                }else{
                    $feedback_count = $crawler_ebay->filter('.fdbk-detail-list')->filter('h2.fdbk-detail-list__title')->filter('span.SECONDARY')->text();
                }
                
                if ($market_place=="US") {
                    #US price
                    $product_price = substr($product_price, 3);

                    $regex = "/[\d.,]+/";
                    preg_match($regex, $product_price, $matches);
                    $price_number = floatval(preg_replace("/[^\d.]/", "", $matches[0]));
                }else{
                    #EUROPE price
                    $product_price = substr($product_price, 3);
                    $product_price = str_replace(" ", "€", $product_price);

                    $regex = "/\d+,\d+/";
                    preg_match($regex, $product_price, $matches);
                    $price_number = floatval(str_replace(",", ".", $matches[0]));
                }
                
                if (($crawler_ebay->filter('.progress-bar')->count())>0) {
                    $datas = array();
                    $crawler_ebay->filter('.progress-bar')->each(function ($node) use (&$datas) {
                        array_push($datas, $node->attr('value'));
                    });
                    //$datas = array_filter($datas);
                    $average_rating = array_sum($datas)/count($datas);
                }else{
                    $average_rating = 'Null';
                }

                Product::where('id', $id)->update([
                    'product_price' => $product_price,
                    'product_price_number' => $price_number,
                    'product_comments' => $feedback_count,
                    'product_rating' => $average_rating,
                    'product_instock' => $stock_details
                ]);
                $message = "Promo_code: ".$data->product_promo_code." Ebay product update successfully";
                return redirect()->back()->with('message',$message);

            }else{
                return redirect()->back()->with('message_error','Product Id not found!');
            }    
        }
        elseif (strtolower($data_company_name->company_name) == 'walmart') {
            if(isset($data->product_link_id)){
                #9e7edde96cmshef4f7ae33a8aa07p1ccfd4jsn9a84b20e19cd  murad apikey
                #559103a12bmsh9a494d921dfec34p1fc011jsna8ce6fb2d440  muraddev apikey
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://axesso-walmart-data-service.p.rapidapi.com/wlm/walmart-lookup-product?url=".$data->product_url."",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 300,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: axesso-walmart-data-service.p.rapidapi.com",
                        "X-RapidAPI-Key: 559103a12bmsh9a494d921dfec34p1fc011jsna8ce6fb2d440"
                    ],
                ]);
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err) {
                    $message = "Promo_code: ".$data->product_promo_code." Walmart update error: ".$err." ";
                    return redirect()->back()->with('message_error',$message);
                } else {
                    $response = json_decode($response);
                    $product_price = $response->item->props->pageProps->initialData->data->product->priceInfo->currentPrice->priceString;
                    $product_price_number = $response->item->props->pageProps->initialData->data->product->priceInfo->currentPrice->price;
                    $product_comments = $response->item->props->pageProps->initialData->data->product->numberOfReviews;
                    $product_instock = $response->item->props->pageProps->initialData->data->product->availabilityStatus;
                    
                    $str = $response->item->props->pageProps->initialData->data->reviews->averageOverallRating;
                    $num = floatval($str);
                    $result = round($num, 1);
                    $product_rating = $result;

                    Product::where('id', $id)->update([
                        'product_price' => $product_price,
                        'product_price_number' => $product_price_number,
                        'product_comments' => $product_comments,
                        'product_rating' => $product_rating,
                        'product_instock' => $product_instock
                    ]);
                    $message = "Promo_code: ".$data->product_promo_code." Walmart product update successfully";
                    return redirect()->back()->with('message',$message);
                }
            }else{
                return redirect()->back()->with('message_error','Product Id not found!');
            }
        }
        elseif (strtolower($data_company_name->company_name) == 'aliexpress') {
            if(isset($data->product_link_id)){
                #9e7edde96cmshef4f7ae33a8aa07p1ccfd4jsn9a84b20e19cd  murad apikey
                #559103a12bmsh9a494d921dfec34p1fc011jsna8ce6fb2d440  muraddev apikey
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://ali-express-data-service.p.rapidapi.com/item/itemInfo?itemId=".$data->product_link_id."",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: ali-express-data-service.p.rapidapi.com",
                        "X-RapidAPI-Key: 9e7edde96cmshef4f7ae33a8aa07p1ccfd4jsn9a84b20e19cd"
                    ],
                ]);
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err) {
                    $message = "Promo_code: ".$data->product_promo_code." Aliexpress update error: ".$err." ";
                    return redirect()->back()->with('message_error',$message);
                } else {
                    $response = json_decode($response);
                    $product_price = "$".$response->price;
                    $product_price_number = $response->price;
                    if (isset($response->features->reviews)) {
                        $product_comments = $response->features->reviews;
                    }else{
                        $product_comments='Null';
                    }
                    $product_instock = "IN_STOCK";
                    if (isset($response->features->rating)) {
                        $product_rating = $response->features->rating;
                    }else{
                        $product_rating='Null';
                    }

                    Product::where('id', $id)->update([
                        'product_price' => $product_price,
                        'product_price_number' => $product_price_number,
                        'product_comments' => $product_comments,
                        'product_rating' => $product_rating,
                        'product_instock' => $product_instock
                    ]);
                    $message = "Promo_code: ".$data->product_promo_code." Aliexpress product update successfully";
                    return redirect()->back()->with('message',$message);
                }
            }else{
                return redirect()->back()->with('message_error','Product Id not found!');
            }
        }
    }

}
