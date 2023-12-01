<?php

namespace Insitaction\EasyAdminFieldsBundle\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use Insitaction\EasyAdminFieldsBundle\DTO\MaskFieldOptions;

class MaskField
{
    public static function adapt(FieldInterface $field, MaskFieldOptions $options): FieldInterface
    {
        if (!method_exists($field, 'setFormTypeOptions')) {
            return $field;
        }

        return $field
            ->setFormTypeOptions([
                'row_attr' => [
                    'data-controller' => 'mask-field',
                    'data-mask-field-options-value' => json_encode($options->serialize(), JSON_THROW_ON_ERROR),
                ],
            ]);
    }
}
