<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Class NoteWireController
 *
 * Контролер
 * @package App\Http\Livewire
 * @author Alex.Krupnik <krupnik_a@ukr.net>
 * @copyright (c), Thread
 */
class NoteWireController extends Component
{
    use WithPagination;

    /**
     * @var Note
     */
    public $model;
    /**
     * @var Note[]
     */
    protected $models;

    protected $listeners = [
        'noteAdded' => 'render'
    ];

    public function render()
    {

        $this->models = Note::query()->paginate(300);
        return view('livewire.note-wire-controller', ['models' => $this->models]);
    }

    public function onDelete($id)
    {
        $this->model = Note::query()->where('id', '=', $id)->delete();
    }
}
