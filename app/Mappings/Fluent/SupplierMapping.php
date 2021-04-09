<?php

namespace App\Mappings;

use App\Entities\Supplier;
use LaravelDoctrine\Fluent\EntityMapping;

class SupplierMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Supplier::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        // This will result in an autoincremented integer
        $builder->increments('id');

        // Both strings will be varchars
        $builder->string('name')->nullable();
        $builder->string('code')->nullable();
    }
}
