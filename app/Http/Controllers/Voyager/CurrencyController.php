<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBreadController;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

class CurrencyController extends VoyagerBreadController
{
    use BreadRelationshipParser;
    //***************************************
    //               ____
    //              |  _ \
    //              | |_) |
    //              |  _ <
    //              | |_) |
    //              |____/
    //
    //      Browse our Data Type (B)READ
    //
    //****************************************

    public function index(Request $request)
    {
        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = $this->getSlug($request);

        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $rates = DB::table('rates')->orderBy('curency_name')->where('is_active',1)->get();
        

        // $new_rates = [];

        if(isset($rates[0])) {
            foreach($rates as $rate) {
            
                $compare_rates = DB::table('rates')->leftjoin('currencies','rates.id','=','currencies.to_rate_id')
                ->select('currencies.rate_value','currencies.from_rate_id','rates.curency_name')
                ->where('from_rate_id',$rate->id)
                ->where('rates.is_active',1)->get();

                if(isset($compare_rates[0])) {
                    $new_rates[] = $rate;
                } 
            }
        }

        $rates = $new_rates;

        return view('vendor/voyager/currency/browse', 
        compact(
                'rates',
                'dataType',
                'dataTypeContent',
                'isModelTranslatable',
                'search',
                'orderBy',
                'sortOrder',
                'searchable',
                'isServerSide'
            ));

        // return Voyager::view($view, compact(
        //     'dataType',
        //     'dataTypeContent',
        //     'isModelTranslatable',
        //     'search',
        //     'orderBy',
        //     'sortOrder',
        //     'searchable',
        //     'isServerSide'
        // ));
    }

    //***************************************
    //                _____
    //               |  __ \
    //               | |__) |
    //               |  _  /
    //               | | \ \
    //               |_|  \_\
    //
    //  Read an item of our Data Type B(R)EAD
    //
    //****************************************

    public function show(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $relationships = $this->getRelationships($dataType);
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $dataTypeContent = call_user_func([$model->with($relationships), 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');

        // Check permission
        $this->authorize('read', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.read';

        if (view()->exists("voyager::$slug.read")) {
            $view = "voyager::$slug.read";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $relationships = $this->getRelationships($dataType);

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? app($dataType->model_name)->with($relationships)->where('from_rate_id', $id)->first()
            : DB::table($dataType->name)->where('from_rate_id', $id)->first(); // If Model doest exist, get data from table name

        foreach ($dataType->editRows as $key => $row) {
            $details = json_decode($row->details);
            $dataType->editRows[$key]['col_width'] = isset($details->width) ? $details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'vendor/voyager/currency/edit-add';

        $compare_rates = DB::table('rates')->where('id','!=',$id)->where('is_active',1)->get();

            // dd($compare_rates);

            
        $query = DB::table('rates')->where('rates.is_active',1);
        
        $rates = clone $query->orderBy('curency_name')->get();

        $rate_item = clone $query->where('id',$id)->first();


        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('compare_rates','rates','rate_item','dataType','dataTypeContent', 'isModelTranslatable'));
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $slug, $id);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            // $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

            // event(new BreadDataUpdated($dataType, $data));

            DB::table('currencies')->where('from_rate_id',$request->from_rate_id)->delete();

            for($i = 0; $i < count($request->rate_compare); $i++) {
                DB::table('currencies')->insert(
                    [
                        'from_rate_id' => $request->from_rate_id, 
                        'rate_value' => (isset($request->rate_compare[$i])) ? $request->rate_compare[$i] : 0,
                        'to_rate_id'=>$request->to_rate_id[$i],
                        'created_at'=>now()->format('Y-m-d H:i:s'),
                        'updated_at'=>now()->format('Y-m-d H:i:s'),
                    ]
                );
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager.generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    // Add a new item of our Data Type BRE(A)D
    //
    //****************************************

    public function create(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
                            ? new $dataType->model_name()
                            : false;

        foreach ($dataType->addRows as $key => $row) {
            $details = json_decode($row->details);
            $dataType->addRows[$key]['col_width'] = isset($details->width) ? $details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        $rates = DB::table('rates')->orderBy('curency_name')->where('rates.is_active',1)->get();

        return view('vendor/voyager/currency/edit-add', compact('rates','dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            // $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            // event(new BreadDataAdded($dataType, $data));

            $exists = DB::table('currencies')->where('from_rate_id',$request->from_rate_id)->exists();

            if(!$exists) {
                for($i = 0; $i < count($request->rate_compare); $i++) {
                    DB::table('currencies')->insert(
                        [
                            'from_rate_id' => $request->from_rate_id, 
                            'rate_value' => (isset($request->rate_compare[$i])) ? $request->rate_compare[$i] : 0,
                            'to_rate_id'=>$request->to_rate_id[$i],
                            'created_at'=>now()->format('Y-m-d H:i:s'),
                            'updated_at'=>now()->format('Y-m-d H:i:s'),
                        ]
                    );
                }
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                        'message'    => __('voyager.generic.successfully_added_new')." {$dataType->display_name_singular}",
                        'alert-type' => 'success',
                    ]);
        }

    }

    //***************************************
    //                _____
    //               |  __ \
    //               | |  | |
    //               | |  | |
    //               | |__| |
    //               |_____/
    //
    //         Delete an item BREA(D)
    //
    //****************************************

    public function destroy(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('delete', app($dataType->model_name));

        // Init array of IDs
        // $ids = [];
        // if (empty($id)) {
        //     // Bulk delete, get IDs from POST
        //     $ids = explode(',', $request->ids);
        // } else {
        //     // Single item delete, get ID from URL or Model Binding
        //     $ids[] = $id instanceof Model ? $id->{$id->getKeyName()} : $id;
        // }
        // foreach ($ids as $id) {
        //     $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
        //     $this->cleanup($dataType, $data);
        // }

        // $displayName = count($ids) > 1 ? $dataType->display_name_plural : $dataType->display_name_singular;

        DB::table('currencies')->where('from_rate_id',$id)->delete();

        // $res = $data->destroy($ids);
        $res = '';
        $data = [
                'message'    => __('voyager.generic.successfully_deleted'),
                'alert-type' => 'success',
            ];

        if ($res) {
            event(new BreadDataDeleted($dataType, $data));
        }

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }

    /**
     * Remove translations, images and files related to a BREAD item.
     *
     * @param \Illuminate\Database\Eloquent\Model $dataType
     * @param \Illuminate\Database\Eloquent\Model $data
     *
     * @return void
     */
    protected function cleanup($dataType, $data)
    {
        // Delete Translations, if present
        if (is_bread_translatable($data)) {
            $data->deleteAttributeTranslations($data->getTranslatableAttributes());
        }

        // Delete Images
        $this->deleteBreadImages($data, $dataType->deleteRows->where('type', 'image'));

        // Delete Files
        foreach ($dataType->deleteRows->where('type', 'file') as $row) {
            $files = json_decode($data->{$row->field});
            if ($files) {
                foreach ($files as $file) {
                    $this->deleteFileIfExists($file->download_link);
                }
            }
        }
    }

    
}
