<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use SpaceMvc\Framework\Library\Request;
use SpaceMvc\Framework\Mvc\Model;
use SpaceMvc\Framework\Mvc\View;

/**
 * Class CrudController
 * @package App\Http\Controllers\Admin
 */
class CrudController extends BaseController
{
    /** @var string $layout */
    protected string $layout = 'backend';

    /** @var string $modelName */
    protected string $modelName = 'App\Model\User';

    /** @var string $viewBase */
    protected string $viewBase = 'backend.users';

    /** @var string $uriBase */
    protected string $uriBase = '/admin/users';

    /**
     * index
     * @return View
     */
    public function index()
    {
        $results = $this->modelName::find('all');

        return $this->app->getView($this->viewBase.'.index', [
            'results' => $results
        ]);
    }

    /**
     * create
     * @return View
     */
    public function create() : View
    {
        return $this->app->getView($this->viewBase.'.create');
    }

    /**
     * store
     * @return View
     */
    public function store() : View
    {
        /** @var Request $post */
        $request = $this->app->getRequest();

        /** @var Model $result */
        $result = $this->modelName::create($request->post());

        // redirect to uri base
        header('Location: '.$this->uriBase, 0);
    }

    /**
     * edit
     * @return View
     */
    public function edit() : View
    {
        $id = $this->app->getRequest()->get('id');
        $result = $this->modelName::find(['id' => $id]);

        dump($result);

        return $this->app->getView($this->viewBase.'.edit');
    }

    public function update()
    {

    }

    /**
     * delete
     * @return View
     */
    public function delete(): View
    {
        return $this->app->getView($this->viewBase.'.delete');
    }

    public function destroy()
    {

    }
}
