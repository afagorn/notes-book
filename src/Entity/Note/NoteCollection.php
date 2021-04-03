<?php
namespace Entity\Note;

use core\Collection\AbstractCollection;

class NoteCollection extends AbstractCollection
{
    public const ITEM_CLASS = Note::class;
}