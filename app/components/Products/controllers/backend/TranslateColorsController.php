<?php namespace Components\Products\Controllers\Backend;

use App, Input, Redirect, Request, Sentry, Str, View, File;
use Components\Products\Models\Color;
use Services\TranslateManager;
use Services\Validation\ValidationException as ValidationException;

class TranslateColorsController extends \BaseController {

    private $translate;
	public function __construct( TranslateManager $translateManager) {
		View::addLocation(app_path() . '/components/Products/views');
		View::addNamespace('Products', app_path() . '/components/Products/views');

		parent::__construct();
        View::share('languages', $translateManager->languages());
        $this->translate = $translateManager;
	}

    /**
     * Display a listing of the posts.
     *
     * @param $id
     * @return Response
     */
    public function index($id) {
        $category = Color::findOrFail($id);
        $translates = $this->translate->all($category);
        $this->layout->title = 'All Translate Colors';
        $this->layout->content = View::make('Products::backend.translates.colors.index')
        ->with('category', $category)->with('translates', $translates)->with('module', get_class($category));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int $id
     * @param $lang
     * @return Response
     */
    public function edit($id, $lang)
    {
        $category = Color::find($id);
        $this->layout->title = 'Edit ' . $category->name;
        $this->layout->content = View::make('Products::backend.translates.colors.create')
                                ->with('category', $category)
                                ->with('lang', $lang);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  int $id
     * @param $lang
     * @return Response
     */
    public function update($id, $lang)
    {
        $category = Color::findOrFail($id);
        $input = Input::except('_token', '_method', 'form_save');
        if (isset($input['form_close'])) {
            return Redirect::route('backend.product-colors.translate.index', $id);
        }
        try {
            foreach( $input as $key => $value) {
                $object = $this->translate->find($category, $lang, $key);
                if($object) {
                    $object->content = $value;
                    $object->save();
                } else {
                    $this->translate->save($category, $lang, $key, $value);
                }
            }
            return Redirect::route('backend.product-colors.translate.index', $id)
                                ->with('success_message', 'The translate was updated.');
        } catch(ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

}

