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
    protected string $layout = 'admin';

    /** @var string $modelName */
    protected string $modelName = 'App\Model\User';

    /** @var string $viewBase */
    protected string $viewBase = 'admin.crud';

    /** @var string $uriBase */
    protected string $uriBase = '/admin/users';

    /**
     * index
     * @return View
     */
    public function index(): View
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
     */
    public function store()
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
        if(!empty($result)) {
            $result = $result->attributes();
        }

        return $this->app->getView($this->viewBase.'.edit', [
            'result' => $result
        ]);
    }

    /**
     * update
     */
    public function update(): void
    {
        $id = $this->app->getRequest()->get('id');
        $data = $this->app->getRequest()->post();

        $result = $this->modelName::find(['id' => $id]);
        $result->update_attributes($data);
        $result->save();

        header('Location: '.$this->uriBase, 0);
    }

    /**
     * delete
     * @return View
     */
    public function delete(): View
    {
        $id = $this->app->getRequest()->get('id');

        $result = $this->modelName::find(['id' => $id]);
        if(!empty($result)) {
            $result = $result->attributes();
        }

        return $this->app->getView($this->viewBase.'.delete', [
            'result' => $result
        ]);
    }

    /**
     * destroy
     */
    public function destroy(): void
    {
        $id = $this->app->getRequest()->get('id');

        $result = $this->modelName::find(['id' => $id]);
        $result->delete();

        header('Location: '.$this->uriBase, 0);
    }
}
