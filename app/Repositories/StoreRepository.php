<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface StoreRepository.
 *
 * @package namespace App\Repositories;
 */
interface StoreRepository extends RepositoryInterface
{
    public function sinc_products($attributes, $id);
}
