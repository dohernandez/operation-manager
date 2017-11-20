<?php

namespace ManagerBundle\Event;

final class CRUDEvents
{
    /**
     * The PRE_SAVED event is dispatched at the beginning of the Repository::save() method.
     *
     * It can be used to:
     *  - Change data from the entity, before saving the data to the database.
     *  - Update fields, before saving the data to the database.
     *
     * @Event("ManagerBundle\Event\CRUDEvents")
     */
    const PRE_SAVED = 'crud.pre_saved';
    /**
     * The POST_SAVED event is dispatched after the Repository::save() method.
     *
     * It can be used to:
     *  - Save bidirectional entity relations, after saving the data to the database.
     *  - Update relations, after saving the data to the database.
     *
     * @Event("ManagerBundle\Event\CRUDEvents")
     */
    const POST_SAVED = 'crud.post_saved';
    /**
     * The POST_DELETED event is dispatched after the Repository::delete() method.
     *
     * It can be used to:
     *  - Removed bidirectional entity relations, after removing the data from the database.
     *  - Update relations, after removing the data from the database.
     *
     * @Event("ManagerBundle\Event\CRUDEvents")
     */
    const POST_DELETED = 'crud.post_deleted';
}
