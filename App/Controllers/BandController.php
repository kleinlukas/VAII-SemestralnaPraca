<?php

namespace App\Controllers;

use App\Models\Band;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class BandController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    public function index(Request $request): Response
    {
        $bands = Band::getAll();
        return $this->html(compact('bands'));
    }

    public function create(Request $request): Response
    {
        if ($request->isPost()) {
            $band = new Band();
            $band->setName($request->value('name'));
            $band->setGenre($request->value('genre'));
            $band->setEmail($request->value('email'));
            $band->setSetupTime((int)$request->value('setup_time'));
            $band->setDescription($request->value('description'));
            $band->save();
            return $this->redirect($this->url('band.index'));
        }

        return $this->html();
    }

    public function edit(Request $request): Response
    {
        $id = $request->value('id');
        $band = Band::getOne($id);

        if ($band === null) {
            return $this->redirect($this->url('band.index'));
        }

        if ($request->isPost()) {
            $band->setName($request->value('name'));
            $band->setGenre($request->value('genre'));
            $band->setEmail($request->value('email'));
            $band->setSetupTime((int)$request->value('setup_time'));
            $band->setDescription($request->value('description'));
            $band->save();
            return $this->redirect($this->url('band.index'));
        }

        return $this->html(compact('band'));
    }

    public function delete(Request $request): Response
    {
        $id = $request->value('id');
        $band = Band::getOne($id);

        if ($band !== null) {
            $band->delete();
        }

        return $this->redirect($this->url('band.index'));
    }
}