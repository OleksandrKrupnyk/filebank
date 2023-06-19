<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

/**
 * Class TestWindow
 *
 *
 * @package App\Http\Livewire
 * @author Alex.Krupnik <krupnik_a@ukr.net>
 * @copyright (c), Thread
 */
class ModalWindow extends Component
{
    public bool $showModal = false;

    protected $listeners = [
        'showModal' => 'onShowModal'
    ];

    /**
     * @var Note
     */
    public $model;

    protected $rules = [
        'model.title' => 'required|string|max:100',
        'model.content' => 'required|string|max:250',
        'model.price' => 'numeric',
        'model.from_date' => 'date|date_format:Y-m-d h:s',
        'model.till_date' => 'date|date_format:Y-m-d h:s',
    ];

    public function render()
    {
        $formId = 'formid_' . random_int(1000, 2000);
        return view('livewire.modal-window', ['formId' => $formId]);
    }

    public function onClose()
    {
        $this->showModal = false;
    }

    public function onSave()
    {
        $save = $this->model->save();
        if ($save) {
            $this->showModal = false;
            $this->emitTo('note-wire-controller', 'noteAdded');
        }

    }


    public function onShowModal(int $id = null)
    {
        if ($id) {
            $this->model = Note::query()->where('id', $id)->first();
        } else {
            $this->model = new Note();
        }
        $this->showModal = true;
    }
}
