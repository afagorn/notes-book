<?php
namespace Repository;

use Entity\Entity;

interface IRepository
{
    /**
     * @param Entity $entity
     * @return mixed
     */
    function add(Entity $entity);

    /**
     * @param Entity $entity
     * @return mixed
     */
    function remove(Entity $entity);

    /**
     * @return Entity
     */
    function get();

    /**
     * @param Entity $entity
     * @return mixed
     */
    function update(Entity $entity);
}