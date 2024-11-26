<?php

return [

    'accepted'             => 'Il campo :attribute deve essere accettato.',
    'active_url'           => 'Il campo :attribute non è un URL valido.',
    'after'                => 'Il campo :attribute deve essere una data successiva a :date.',
    'alpha'                => 'Il campo :attribute deve contenere solo lettere.',
    'alpha_dash'           => 'Il campo :attribute deve contenere solo lettere, numeri, trattini e underscore.',
    'alpha_num'            => 'Il campo :attribute deve contenere solo lettere e numeri.',
    'array'                => 'Il campo :attribute deve essere un array.',
    'before'               => 'Il campo :attribute deve essere una data precedente a :date.',
    'between'              => [
        'numeric' => 'Il campo :attribute deve essere tra :min e :max.',
        'file'    => 'Il campo :attribute deve essere tra :min e :max kilobyte.',
        'string'  => 'Il campo :attribute deve essere tra :min e :max caratteri.',
        'array'   => 'Il campo :attribute deve avere tra :min e :max elementi.',
    ],
    'boolean'              => 'Il campo :attribute deve essere vero o falso.',
    'confirmed'            => 'La conferma di :attribute non corrisponde.',
    'date'                 => 'Il campo :attribute non è una data valida.',
    'date_equals'          => 'Il campo :attribute deve essere una data uguale a :date.',
    'date_format'          => 'Il campo :attribute non corrisponde al formato :format.',
    'different'            => 'I campi :attribute e :other devono essere differenti.',
    'digits'               => 'Il campo :attribute deve essere di :digits cifre.',
    'digits_between'       => 'Il campo :attribute deve essere tra :min e :max cifre.',
    'dimensions'           => 'Il campo :attribute ha dimensioni non valide.',
    'distinct'             => 'Il campo :attribute ha un valore duplicato.',
    'email'                => 'Il campo :attribute deve essere un indirizzo email valido.',
    'ends_with'            => 'Il campo :attribute deve terminare con uno dei seguenti: :values.',
    'exists'               => 'Il campo :attribute selezionato non è valido.',
    'file'                 => 'Il campo :attribute deve essere un file.',
    'filled'               => 'Il campo :attribute è obbligatorio.',
    'gt'                   => [
        'numeric' => 'Il campo :attribute deve essere maggiore di :value.',
        'file'    => 'Il campo :attribute deve essere maggiore di :value kilobyte.',
        'string'  => 'Il campo :attribute deve contenere più di :value caratteri.',
        'array'   => 'Il campo :attribute deve avere più di :value elementi.',
    ],
    'gte'                  => [
        'numeric' => 'Il campo :attribute deve essere maggiore o uguale a :value.',
        'file'    => 'Il campo :attribute deve essere maggiore o uguale a :value kilobyte.',
        'string'  => 'Il campo :attribute deve contenere almeno :value caratteri.',
        'array'   => 'Il campo :attribute deve avere almeno :value elementi.',
    ],
    'image'                => 'Il campo :attribute deve essere un’immagine.',
    'in'                   => 'Il campo :attribute selezionato non è valido.',
    'in_array'             => 'Il campo :attribute non esiste in :other.',
    'integer'              => 'Il campo :attribute deve essere un numero intero.',
    'ip'                   => 'Il campo :attribute deve essere un indirizzo IP valido.',
    'ipv4'                 => 'Il campo :attribute deve essere un indirizzo IPv4 valido.',
    'ipv6'                 => 'Il campo :attribute deve essere un indirizzo IPv6 valido.',
    'json'                 => 'Il campo :attribute deve essere una stringa JSON valida.',
    'lt'                   => [
        'numeric' => 'Il campo :attribute deve essere minore di :value.',
        'file'    => 'Il campo :attribute deve essere minore di :value kilobyte.',
        'string'  => 'Il campo :attribute deve contenere meno di :value caratteri.',
        'array'   => 'Il campo :attribute deve avere meno di :value elementi.',
    ],
    'lte'                  => [
        'numeric' => 'Il campo :attribute deve essere minore o uguale a :value.',
        'file'    => 'Il campo :attribute deve essere minore o uguale a :value kilobyte.',
        'string'  => 'Il campo :attribute deve contenere al massimo :value caratteri.',
        'array'   => 'Il campo :attribute non deve avere più di :value elementi.',
    ],
    'max'                  => [
        'numeric' => 'Il campo :attribute non può essere maggiore di :max.',
        'file'    => 'Il campo :attribute non può essere maggiore di :max kilobyte.',
        'string'  => 'Il campo :attribute non può essere maggiore di :max caratteri.',
        'array'   => 'Il campo :attribute non può avere più di :max elementi.',
    ],
    'mimes'                => 'Il campo :attribute deve essere un file di tipo: :values.',
    'mimetypes'            => 'Il campo :attribute deve essere un file di tipo: :values.',
    'min'                  => [
        'numeric' => 'Il campo :attribute deve essere almeno :min.',
        'file'    => 'Il campo :attribute deve essere almeno :min kilobyte.',
        'string'  => 'Il campo :attribute deve contenere almeno :min caratteri.',
        'array'   => 'Il campo :attribute deve avere almeno :min elementi.',
    ],
    'not_in'               => 'Il campo :attribute selezionato non è valido.',
    'not_regex'            => 'Il formato del campo :attribute non è valido.',
    'numeric'              => 'Il campo :attribute deve essere un numero.',
    'password'             => 'La password è errata.',
    'present'              => 'Il campo :attribute deve essere presente.',
    'regex'                => 'Il formato del campo :attribute non è valido.',
    'required'             => 'Il campo :attribute è obbligatorio.',
    'required_if'          => 'Il campo :attribute è obbligatorio quando :other è :value.',
    'required_unless'     => 'Il campo :attribute è obbligatorio a meno che :other non sia in :values.',
    'required_with'       => 'Il campo :attribute è obbligatorio quando :values è presente.',
    'required_with_all'   => 'Il campo :attribute è obbligatorio quando tutti i valori :values sono presenti.',
    'required_without'    => 'Il campo :attribute è obbligatorio quando :values non è presente.',
    'required_without_all'=> 'Il campo :attribute è obbligatorio quando nessuno dei valori :values è presente.',
    'same'                 => 'I campi :attribute e :other devono essere uguali.',
    'size'                 => [
        'numeric' => 'Il campo :attribute deve essere :size.',
        'file'    => 'Il campo :attribute deve essere di :size kilobyte.',
        'string'  => 'Il campo :attribute deve contenere :size caratteri.',
        'array'   => 'Il campo :attribute deve contenere :size elementi.',
    ],
    'starts_with'          => 'Il campo :attribute deve iniziare con uno dei seguenti: :values.',
    'string'               => 'Il campo :attribute deve essere una stringa.',
    'timezone'             => 'Il campo :attribute deve essere una zona valida.',
    'unique'               => 'Il campo :attribute è già stato preso.',
    'uploaded'             => 'Il campo :attribute non è stato caricato correttamente.',
    'url'                  => 'Il campo :attribute deve essere un URL valido.',
    'uuid'                 => 'Il campo :attribute deve essere un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to specify
    | a specific custom language line for a given attribute.
    |
    */

    'custom' => [
        'name' => [
            'required' => 'Il nome azienda è obbligatorio.',
            'max' => 'Il nome dell\'azienda non può superare 255 caratteri.',
        ],
        'email' => [
            'required' => 'L\'email è obbligatoria.',
            'email' => 'L\'email deve essere valida.',
            'unique' => 'Email già registrata.',
        ],
        'phone' => [
            'required' => 'Il numero di telefono è obbligatorio.',
            'max' => 'Il numero di telefono non può superare i 15 caratteri.',
        ],
        'user_img' =>[
            'image' => 'Il file caricato deve essere un\'immagine.',
            'mimes' => 'Il file immagine caricato deve essere nei formati: jpeg, png, jpg.',
            'max' => 'L\'immagine non può superare i 2MB.',
        ],
        'legal_city' =>[
            'required' => 'La città della sede legale è obbligatoria.',
            'max' => 'Il nome della città della sede legale non può superare i 255 caretteri.',
        ],
        'zip_code' =>[
            'required' => 'Il codice postale è obbligatorio.',
            'digits' => 'Il codice postale dev\'essere di 5 cifre'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation attributes, for example:
    |
    | 'email' => 'indirizzo email',
    |
    */

    
];
