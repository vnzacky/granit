<?php
namespace Components\Stones\Validation;

use Services\Validation\Validator as Validator;

class FontValidator extends Validator{

	/**
     * Default rules
     * @var array
     */
    protected $rules = array(
        'name'     		=> 'required|regex:/^[a-zA-Z0-9\-\.\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'url' 		=> 'required|url',
    );

    /**
     * Default rules for update
     * @var array
     */
    protected $updateRules = array(
        'name'     		=> 'required|regex:/^[a-zA-Z0-9\-\.\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'url'		=> 'required|url',
    );

    /**
     * Messages for validation
     * @var array
     */
    protected $message = array(
    );

    public function validateForCreation($input)
    {
        return $this->validate($input, $this->rules, $this->message);
    }
    public function validateForUpdate($input)
    {
        return $this->validate($input, $this->updateRules, $this->message);
    }

}