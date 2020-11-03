<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Sentinel;
use Session;
use DataTables;
use App\Model\Categories;
use App\Model\Brand;
use App\Model\AttributeSet;
use App\Model\Options;
use App\Model\Optionvalues;
use App\Model\Attributes;
use App\Model\Attributevalues;
use App\Model\Product;
use App\Model\Review;
use App\Model\ProductAttributes;
use App\Model\ProductOption;
use App\Model\Taxes;
use Image;
use Artisan;
use Hash;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::callschedule();
    }
    public function showproduct()
    {
        return view("admin.product.product");
    }

    public function showattset()
    {
        return view("admin.product.attributeset");
    }



    public function getoptionvalues($id)
    {
        $optionvalues = Options::with("optionlist")->where("id", $id)->first();
        return json_encode($optionvalues);
    }

    public function getallproduct()
    {
        $data = Product::all();
        return json_encode($data);
    }

    public function getallsearchproduct(Request $request)
    {
        if ($request->get("id") == 0) {
            $data = Product::all();
            return json_encode($data);
        } else {
            $data = Product::where("category", $request->get("id"))->get();
            return json_encode($data);
        }
    }
    public function getproductprice($id)
    {
        $data = Product::find($id);
        return json_encode($data);
    }

    public function productdatatable()
    {
        $category = Product::orderBy('id', 'DESC')->where('is_deleted', '0')->get();
        return DataTables::of($category)
            ->editColumn('id', function ($category) {
                return $category->id;
            })
            ->editColumn('thumbnail', function ($category) {
                return asset('upload/product') . "/" . ($category->basic_image == "" ? "default.jpg" : $category->basic_image);
            })
            ->editColumn('name', function ($category) {
                return $category->name;
            })
            ->editColumn('price', function ($category) {
                return $category->price;
            })
            ->editColumn('action', function ($category) {
                $editoption = url('admin/editproduct', array('id' => $category->id));
                $changestaus = url('admin/changeproductstatus', array('id' => $category->id));
                $deletecatlog = url('admin/deletecatlog', array('id' => $category->id));
                if ($category->status == '1') {
                    $color = "green";
                } else {
                    $color = "red";
                }
                $return = '<a  href="' . $editoption . '" rel="tooltip"  class="m-b-10 m-l-5" data-original-title="Remove"><i class="fa fa-edit f-s-25" style="margin-right: 10px;font-size: x-large;"></i></a><a onclick="delete_record(' . "'" . $deletecatlog . "'" . ')" rel="tooltip"  class="m-b-10 m-l-5" data-original-title="Remove" style="margin-right: 10px;"><i class="fa fa-trash f-s-25" style="font-size: x-large;"></i></a><a href="' . $changestaus . '" rel="tooltip" class="m-b-10 m-l-5" data-original-title="Remove" style="margin-right: 10px;"><i class="fa fa-ban f-s-25" style="font-size: x-large;color:' . $color . '"></i></a>';
                return $return;
            })
            ->make(true);
    }

    public function changeproductstatus($id)
    {
        $store = Product::find($id);
        if ($store->status == '0') {
            $store->status = '1';
        } else {
            $store->status = '0';
        }
        $store->save();
        Session::flash('message', __('messages_error_success.product_status_update'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
    public function editproduct($id)
    {
        $product = Product::find($id);
        $category = Categories::where("parent_category", 0)->where("is_delete", '0')->get();
        $subcategory = Categories::where("parent_category", $product->category)->where("is_delete", '0')->get();
        $brand = Brand::where("category_id", $product->subcategory)->where("is_delete", '0')->get();
        $attribute = ProductAttributes::where("product_id", $id)->get();
        $optionvalue = ProductOption::where("product_id", $id)->first();
        $attributedrop = AttributeSet::whereHas('attributelist', function ($q) use ($product) {
            $q->where("is_delete", '0')->where("category", $product->category);
        })->where("is_deleted", '0')->get();
        foreach ($attributedrop as $k) {
            $getdata = Attributes::where("att_set_id", $k->id)->where("is_delete", '0')->where("category", $product->category)->get();
            $k->attributelist = $getdata;
        }
        $optionvalues = Options::with("optionlist")->get();
        $tax = Taxes::all();
        return view("admin.product.edit.default")->with("product", $product)->with("product_attribute", $attribute)->with("product_option", $optionvalue)->with("attributedrop", $attributedrop)->with("optionvalues", $optionvalues)->with("category", $category)->with("subcategory", $subcategory)->with("brand", $brand)->with("tax", $tax);
    }

    public function productlist($id, $pro_id)
    {
        $category = Product::orderBy('id', 'DESC')->where("subcategory", $id)->where("id", "!=", $pro_id)->get();
        return DataTables::of($category)
            ->editColumn('id', function ($category) {
                return $category->id;
            })
            ->editColumn('thumbnail', function ($category) {
                return asset('upload/product') . "/" . $category->basic_image;
            })
            ->editColumn('name', function ($category) {
                return $category->name;
            })
            ->editColumn('price', function ($category) {
                return $category->price;
            })

            ->make(true);
    }

    public function getattributedata(Request $request)
    {

        if ($request->get("product") == 0) {
            $category = Categories::where("is_delete", '0')->first();
            $id = $category->id;
        } else {
            $product = Product::find($request->get("product"));
            $id = $product->category;
        }

        $attributedrop = AttributeSet::whereHas('attributelist', function ($q) use ($id) {
            $q->where("is_delete", '0')->where("category", $id);
        })->where("is_deleted", '0')->get();
        foreach ($attributedrop as $k) {
            $getdata = Attributes::where("is_delete", '0')->where("att_set_id", $k->id)->where("category", $id)->get();
            if (count($getdata) != 0) {
                $k->attributelist = $getdata;
            }
        }
        return json_encode($attributedrop);
    }

    public function showaddcatalog()
    {
        $category = Categories::where("parent_category", 0)->where("is_delete", '0')->get();
        $attributedrop = AttributeSet::with('attributelist')->whereHas('attributelist', function ($q) {
            $q->where("is_deleted", '0');
        })->where("is_deleted", '0')->get();
        $optionvalues = Options::with("optionlist")->where("is_deleted", '0')->get();
        $tax = Taxes::all();
        return view("admin.product.addproduct")->with("category", $category)->with("attributedrop", $attributedrop)->with("optionvalues", $optionvalues)->with("tax", $tax);
    }

    public function getsubcategory($id)
    {
        $data = Categories::where("parent_category", $id)->where("is_delete", '0')->get();
        return json_encode($data);
    }

    public function saveproduct(Request $request)
    {
        $store = new Product();
        $store->name = $request->get("name");
        $store->description = $request->get("desc");
        $store->category = $request->get("category");
        $store->subcategory = $request->get("subcategory");
        $store->brand = $request->get("brand");
        $store->tax_class = $request->get("texable");
        $store->status = $request->get("status");
        $store->product_color = $request->get("color");
        $store->color_name = $request->get("colorname");
        $store->meta_keyword = $request->get("keywords");
        $store->save();
        return $store->id;
    }
    public function updateproduct(Request $request)
    {
        $store = Product::find($request->get("id"));
        $store->name = $request->get("name");
        $store->description = $request->get("desc");
        $store->category = $request->get("category");
        $store->subcategory = $request->get("subcategory");
        $store->brand = $request->get("brand");
        $store->tax_class = $request->get("texable");
        $store->status = $request->get("status");
        $store->product_color = $request->get("color");
        $store->color_name = $request->get("colorname");
        $store->meta_keyword = $request->get("keywords");
        $store->save();
        return $store->id;
    }
    public function saverelatedproduct(Request $request)
    {
        $store = Product::find($request->get("id"));
        $store->related_product = $request->get("type");
        $store->save();
        return $store->id;
    }

    public function saveupsellproduct(Request $request)
    {
        $store = Product::find($request->get("id"));
        $store->up_sells = $request->get("type");
        $store->save();
        return $store->id;
    }

    public function savecrosssellproduct(Request $request)
    {
        $store = Product::find($request->get("id"));
        $store->cross_sells = $request->get("type");
        $store->save();
        return $store->id;
    }
    public function saveprice(Request $request)
    {
        $store = Product::find($request->get("id"));
        $store->price = $request->get("price");
        $store->selling_price = $request->get("price");
        $store->MRP = $request->get("mrp");
        $store->special_price = $request->get("special_price");
        $store->special_price_start = $request->get("spe_price_start");
        $store->special_price_to = $request->get("spe_price_to");
        $store->save();
        Artisan::call('schedule:run');
        return $store->id;
    }

    public function saveinventory(Request $request)
    {
        if ($request->get("sku") == "") {
            $store = Product::find($request->get("id"));
            $store->sku = $request->get("sku");
            $store->inventory = $request->get("inventory");
            $store->stock = $request->get("stock");
            $store->save();
            return $store->id;
        } else {
            $checksku = Product::where("sku", $request->get("sku"))->where("id", "!=", $request->get("id"))->get();
            if (count($checksku) == 0) {
                $store = Product::find($request->get("id"));
                $store->sku = $request->get("sku");
                $store->inventory = $request->get("inventory");
                $store->stock = $request->get("stock");
                $store->save();
                return $store->id;
            }
            return 0;
        }
    }

    public function saveproductimage(Request $request)
    {
        $store = Product::find($request->get("id"));
        if ($request->get("basic_img") != "") {
            if (strstr($request->get("basic_img"), "http") == "") {

                $image_parts = explode(";base64,", $request->get("basic_img"));
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $data = base64_decode($image_parts[1]);
                $folderName = '/upload/product/';
                $destinationPath = public_path() . $folderName;
                $file_name = uniqid() . $image_type;
                $file = $destinationPath . $file_name;
                $success = file_put_contents($file, $data);
                $store->basic_image = $file_name;
            }
        }
        if ($request->get("additional_img") != "") {
            $add_img = array();
            $data = $request->get("additional_img");
            foreach (array_filter($data) as $k) {
                if (strstr($k, "http") == "") {
                    $image_parts = explode(";base64,", $request->get("basic_img"));
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $data = base64_decode($image_parts[1]);
                    $folderName = '/upload/product/';
                    $destinationPath = public_path() . $folderName;
                    $file_name = uniqid() . $image_type;
                    $file = $destinationPath . $file_name;
                    $success = file_put_contents($file, $data);
                    $add_img[] = $file_name;
                }
            }
            if (!empty(array_filter($add_img))) {
                $store->additional_image = implode(',', $add_img);
            }
        }

        $store->save();
        return $store->id;
    }

    public function saveadditionalinfo(Request $request)
    {
        $store = Product::find($request->get("id"));
        $store->short_description = $request->get("desc");
        $store->product_new_from = $request->get("start");
        $store->product_new_to = $request->get("end");
        $store->save();
        return $store->id;
    }

    public function saveproductattibute(Request $request)
    {
        $checkproattri = ProductAttributes::where("product_id", $request->get("id"))->delete();
        $name = explode(",", $request->get("name"));
        $values = explode("@", $request->get("values"));
        for ($i = 0; $i < count($name); $i++) {
            if ($name[$i] != "") {
                $store = new ProductAttributes();
                $store->product_id = $request->get("id");
                $store->attribute_id = $name[$i];
                $store->values = $values[$i];
                $store->save();
            }
        }
        return $store->product_id;
    }

    public function saveproductoption(Request $request)
    {
        $checkoption = ProductOption::where("product_id", $request->get("id"))->delete();
        if ($request->get("name") != "") {
            $store = new ProductOption();
            $store->product_id = $request->get("id");
            $store->name = $request->get("name");
            $store->type = $request->get("type");
            $store->is_required = $request->get("req");
            $store->label = $request->get("label");
            $store->price = $request->get("price");
            $store->price_type = $request->get("pritype");
            $store->save();
        }

        return "done";
    }
    public function saveseoinfo(Request $request)
    {
        $store = Product::find($request->get("id"));
        $store->url = $request->get("url");
        $store->meta_title = $request->get("title");
        $store->meta_keyword = $request->get("keywords");
        $store->meta_description = $request->get("description");
        $store->save();
        return $store->id;
    }

    public function getattibutevalue($id)
    {
        $data = Attributevalues::where("att_id", $id)->get();
        return json_encode($data);
    }


    public function getbrandbyid($id)
    {
        $data = Brand::where("category_id", $id)->get();
        return json_encode($data);
    }

    public function deletecatlog($id)
    {
        $data = Product::find($id);
        $data->is_deleted = '1';
        $data->save();
        Session::flash('message', __('messages_error_success.catalog_del'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function AttributeSetdatatable()
    {
        $category = AttributeSet::orderBy('id', 'DESC')->where("is_deleted", '0')->get();
        return DataTables::of($category)
            ->editColumn('id', function ($category) {
                return $category->id;
            })
            ->editColumn('name', function ($category) {
                return $category->name;
            })
            ->editColumn('action', function ($category) {
                $deloption = url('admin/deleteattset', array('id' => $category->id));
                $return = '<a onclick="editset(' . $category->id . ')"  rel="tooltip" class="m-b-10 m-l-5" data-original-title="Remove" data-toggle="modal" data-target="#editset"><i class="fa fa-edit f-s-25" style="margin-right: 10px;font-size: x-large;"></i></a><a onclick="delete_record(' . "'" . $deloption . "'" . ')" rel="tooltip"  class="m-b-10 m-l-5" data-original-title="Remove" style="margin-right: 10px;"><i class="fa fa-trash f-s-25" style="font-size: x-large;"></i></a>';
                return $return;
            })
            ->make(true);
    }

    public function addattrset(Request $request)
    {
        $getname = AttributeSet::where("name", $request->get("name"))->first();
        if ($getname) {
            Session::flash('message', "AttributeSet Name Already Existe");
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        } else {
            $store = new AttributeSet();
            $store->name = $request->get("name");
            $store->save();
            Session::flash('message', __('messages_error_success.attributeset_success'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        }
    }

    public function getattrsetbyid($id)
    {
        $data = AttributeSet::find($id);
        return $data->name;
    }

    public function updateattrset(Request $request)
    {
        $getname = AttributeSet::where("name", $request->get("name"))->where("id", "!=", $request->get("id"))->first();
        if ($getname) {
            Session::flash('message', __('messages_error_success.attribute_set_existe'));
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        } else {
            $store = AttributeSet::find($request->get("id"));
            $store->name = $request->get("name");
            $store->save();
            Session::flash('message', __('messages_error_success.attributeset_update_success'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        }
    }
    public function indexoption()
    {
        return view("admin.product.options");
    }

    public function Optiondatatable()
    {
        $option = Options::orderBy('id', 'DESC')->where("is_deleted", '0')->get();
        return DataTables::of($option)
            ->editColumn('id', function ($option) {
                return $option->id;
            })
            ->editColumn('name', function ($option) {
                return $option->name;
            })
            ->editColumn('type', function ($option) {
                if ($option->type == 1) {
                    $status = __('messages.dropdown');
                } else if ($option->type == 2) {
                    $status = __('messages.checkbox');
                } else if ($option->type == 3) {
                    $status = __('messages.radiobutton');
                } else {
                    $status = __('messages.multiple_select');
                }
                return $status;
            })
            ->editColumn('action', function ($option) {
                $editoption = url('admin/editoption', array('id' => $option->id));
                $deloption = url('admin/deleteoption', array('id' => $option->id));
                $return = '<a  href="' . $editoption . '" rel="tooltip"  class="m-b-10 m-l-5" data-original-title="Remove"><i class="fa fa-edit f-s-25" style="margin-right: 10px;font-size: x-large;"></i></a><a onclick="delete_record(' . "'" . $deloption . "'" . ')" rel="tooltip"  class="m-b-10 m-l-5" data-original-title="Remove" style="margin-right: 10px;"><i class="fa fa-trash f-s-25" style="font-size: x-large;"></i></a>';
                return $return;
            })
            ->make(true);
    }

    public function showaddoption()
    {
        return view("admin.product.addoptionvalues");
    }

    public function saveoption(Request $request)
    {
        $label = $request->get('label');
        $price = $request->get('price');
        $price_type = $request->get('price_type');
        $store = new Options();
        $store->name = $request->get("option_name");
        $store->type = $request->get("option_type");
        $store->is_required = $request->get("option_required");
        $store->save();

        for ($i = 0; $i < count($request->get('label')); $i++) {
            $add = new Optionvalues();
            $add->option_id = $store->id;
            $add->label = $label[$i];
            $add->price = $price[$i];
            $add->price_type = $price_type[$i];
            $add->save();
        }
        Session::flash('message', __('messages_error_success.option_add_success'));
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/options');
    }

    public function editoption($id)
    {
        $option = Options::find($id);
        $optionvalue = Optionvalues::where("option_id", $id)->get();
        return view("admin.product.editoption")->with("option", $option)->with("optionvalue", $optionvalue);
    }

    public function updateoption(Request $request)
    {
        $label = $request->get('label');
        $price = $request->get('price');
        $price_type = $request->get('price_type');
        $store = Options::find($request->get("option_id"));
        $store->name = $request->get("option_name");
        $store->type = $request->get("option_type");
        $store->is_required = $request->get("option_required");
        $store->save();
        $delrecord = Optionvalues::where("option_id", $request->get("option_id"))->delete();
        for ($i = 0; $i < count($request->get('label')); $i++) {
            $add = new Optionvalues();
            $add->option_id = $request->get("option_id");
            $add->label = $label[$i];
            $add->price = $price[$i];
            $add->price_type = $price_type[$i];
            $add->save();
        }
        Session::flash('message', __('messages_error_success.option_update_success'));
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/options');
    }

    //attribute

    public function showattribute()
    {
        return view("admin.product.attribute");
    }

    public function attributedatatable()
    {
        $attribute = Attributes::orderBy('id', 'DESC')->where("is_delete", '0')->get();
        return DataTables::of($attribute)
            ->editColumn('id', function ($attribute) {
                return $attribute->id;
            })
            ->editColumn('set_id', function ($attribute) {
                $data = AttributeSet::find($attribute->att_set_id);
                return $data->name;
            })
            ->editColumn('name', function ($attribute) {
                return $attribute->name;
            })
            ->editColumn('is_fill', function ($attribute) {
                if ($attribute->is_filterable == 0) {
                    $status = __('messages.No');
                } else {
                    $status = __('messages.yes');
                }

                return $status;
            })
            ->editColumn('action', function ($attribute) {
                $editoption = url('admin/editattribute', array('id' => $attribute->id));
                $delattrbite = url('admin/deleteattribute', array('id' => $attribute->id));
                $return = '<a  href="' . $editoption . '" rel="tooltip"  class="m-b-10 m-l-5" data-original-title="Remove"><i class="fa fa-edit f-s-25" style="margin-right: 10px;font-size: x-large;"></i></a><a onclick="delete_record(' . "'" . $delattrbite . "'" . ')" rel="tooltip" class="m-b-10 m-l-5" data-original-title="Remove" style="margin-right: 10px;"><i class="fa fa-trash f-s-25" style="font-size: x-large;"></i></a>';
                return $return;
            })
            ->make(true);
    }

    public function showaddattribute()
    {
        $allset = AttributeSet::where("is_deleted", '0')->get();
        $category = Categories::where("parent_category", 0)->get();
        return view("admin.product.addattribute")->with("allset", $allset)->with("category", $category);
    }

    public function saveattribute(Request $request)
    {
        $store = new Attributes();
        $store->att_set_id = $request->get("att_set_id");
        $store->name = $request->get("att_name");
        $store->category = $request->get("att_category");
        $store->is_filterable = $request->get("att_filter");
        $store->save();
        $values = $request->get('values');
        foreach ($values as $val) {
            $add = new Attributevalues();
            $add->att_id = $store->id;
            $add->values = $val;
            $add->save();
        }
        Session::flash('message', __('messages_error_success.attribute_add_success'));
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/attribute');
    }

    public function editattribute($id)
    {
        $allset = AttributeSet::all();
        $category = Categories::where("parent_category", 0)->get();
        $attribute = Attributes::find($id);
        $attvalue = Attributevalues::where("att_id", $id)->get();
        return view("admin.product.editattribute")->with("allset", $allset)->with("category", $category)->with("attribute", $attribute)->with("attvalue", $attvalue);
    }

    public function updateattribute(Request $request)
    {
        $store = Attributes::find($request->get("att_id"));
        $store->att_set_id = $request->get("att_set_id");
        $store->name = $request->get("att_name");
        $store->category = $request->get("att_category");
        $store->is_filterable = $request->get("att_filter");
        $store->save();
        $delvalues = Attributevalues::where("att_id", $request->get("att_id"))->delete();
        $values = $request->get('values');
        foreach ($values as $val) {
            $add = new Attributevalues();
            $add->att_id = $store->id;
            $add->values = $val;
            $add->save();
        }
        Session::flash('message', __('messages_error_success.attribute_update_success'));
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/attribute');
    }

    public function showreview()
    {
        return view("admin.product.review");
    }

    public function reviewdatatable($id)
    {

        $review = array();
        if ($id == "0") {
            $review = Review::with('product', 'userdata')->orderBy('id', 'DESC')->get();
        } else {
            $review = Review::with('product', 'userdata')->where("product_id", $id)->orderBy('id', 'DESC')->get();
        }

        return DataTables::of($review)
            ->editColumn('id', function ($review) {
                return $review->id;
            })
            ->editColumn('pro_name', function ($review) {
                return $review->product->name;
            })
            ->editColumn('rev_name', function ($review) {
                if ($review->userdata != "") {
                    return $review->userdata->first_name;
                } else {
                    return "";
                }
            })
            ->editColumn('rating', function ($review) {
                return $review->ratting . '/5';
            })
            ->editColumn('review', function ($review) {
                return $review->review;
            })
            ->editColumn('action', function ($attribute) {

                $deletereview = url('admin/deletereview', array('id' => $attribute->id));
                $editoption = url('admin/changereview', array('id' => $attribute->id));
                $return = '<a onclick="delete_record(' . "'" . $deletereview . "'" . ')" rel="tooltip"  class="m-b-10 m-l-5" data-original-title="Remove" style="margin-right: 10px;"><i class="fa fa-trash f-s-25" style="font-size: x-large;"></i></a>';
                return $return;
            })
            ->make(true);
    }

    public function changereview($id)
    {
        $store = Review::find($id);
        if ($store->is_approved == '1') {
            $store->is_approved = '0';
        } else {
            $store->is_approved = '1';
        }
        $store->save();
        Session::flash('message', __('messages_error_success.review_status_change'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function deleteoption($id)
    {
        $data = Options::find($id);
        $data->is_deleted = '1';
        $data->save();
        Session::flash('message', __('messages_error_success.option_delete'));
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/options');
    }

    public function deleteattset($id)
    {
        $data = AttributeSet::find($id);
        $data->is_deleted = '1';
        $data->save();
        Session::flash('message', __('messages_error_success.attributeset_del'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function deleteattribute($id)
    {
        $data = Attributes::find($id);
        $data->is_delete = '1';
        $data->save();
        Session::flash('message', __('messages_error_success.attribute_del'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function deletereview($id)
    {
        $data = Review::find($id);
        $data->delete();
        Session::flash('message', __('messages_error_success.review_del_success'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
