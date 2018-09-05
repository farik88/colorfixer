<?php

return [
    'uploaded' => 'Ошибка загрузки файла',
    'mimes' => 'Файл должен иметь одно из перечисленых расширений: :values',
    'unique' => 'Атрибут :attribute с таким значением уже сущесвтует',

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain default error messages used by
    | validator class. Some of these rules have multiple versions such
    | as size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute должен быть принят',
    'active_url'           => ':attribute должен содержать валидный URL',
    'after'                => ':attribute должен быть больше :date',
    'after_or_equal'       => ':attribute должен быть больше или равен :date',
    'alpha'                => ':attribute должен содержать только буквы',
    'alpha_dash'           => ':attribute должен содержать только буквы, числа и тире',
    'alpha_num'            => ':attribute должен содержать только буквы и числа',
    'array'                => ':attribute должен быть массивом',
    'before'               => ':attribute должен быть меньше :date',
    'before_or_equal'      => ':attribute должен быть меньше или равным to :date',
    'between'              => [
        'numeric' => ':attribute должен быть между :min и :max',
        'file'    => ':attribute должен иметь от :min до :max кб',
        'string'  => ':attribute должен иметь от :min до :max символов',
        'array'   => ':attribute должен иметь от :min до :max элементов',
    ],
    'boolean'              => ':attribute должно быть истинным или ложным',
    'confirmed'            => ':attribute подтвержденеи не мовпадает',
    'date'                 => ':attribute не является валидной датой',
    'date_format'          => ':attribute не совпадает с форматом :format',
    'different'            => ':attribute и :other должны отличаться',
    'digits'               => ':attribute должен иметь :digits символов',
    'digits_between'       => ':attribute должен иметь от :min до :max символов',
    'dimensions'           => ':attribute имеет не валидное соотношение сторон',
    'distinct'             => ':attribute содержит дубликат',
    'email'                => ':attribute должен содержать валидный E-Mail',
    'exists'               => ':attribute не валиден',
    'file'                 => ':attribute должен быть файлом',
    'filled'               => ':attribute должен содержать значение',
    'image'                => ':attribute должен быть изображением',
    'in'                   => ':attribute не валиден',
    'in_array'             => ':attribute не содержится в :other',
    'integer'              => ':attribute должен быть целым числом',
    'max'                  => [
        'numeric' => ':attribute не может быть больше :max',
        'file'    => ':attribute не может быть больше :max кб',
        'string'  => ':attribute не может быть больше :max символов',
        'array'   => ':attribute не может содержать больше чем :max элементов',
    ],
    'mimetypes'            => ':attribute должен быть файлом одного из типов: :values',
    'min'                  => [
        'numeric' => ':attribute должен быть не меньше :min',
        'file'    => ':attribute должен быть не меньше :min кб',
        'string'  => ':attribute должен быть не меньше :min символов',
        'array'   => ':attribute должен содржать не меньше :min элементов',
    ],
    'not_in'               => ':attribute не валиден',
    'numeric'              => ':attribute должен быть числом',
    'present'              => ':attribute должен присутствовать',
    'regex'                => ':attribute иммет не валидный формат',
    'required'             => 'поле :attribute обязательно',
    'same'                 => ':attribute и :other должны совпадать',
    'size'                 => [
        'numeric' => ':attribute должен иметь размер :size',
        'file'    => ':attribute должен иметь размер :size кб',
        'string'  => ':attribute должен иметь размер :size символов',
        'array'   => ':attribute должен содержать :size элеиментов',
    ],
    'string'               => ':attribute должен быть строкой',
    'timezone'             => ':attribute должен содержать валидную временную зону',
    'url'                  => ':attribute содержит невалидный формат',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'email' => 'e-mail',
        'password' => 'пароль',
        'password_confirmation' => 'подтверждение пароля',
        'number' => 'гос. номер автомобиля',
        'phone' => 'номер телефона',
        'attachment' => 'медиафайл',
        'name' => 'имя',
        'token' => 'токен'
    ],

];