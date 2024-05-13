<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El camp :attribute ha de ser acceptat.',
    'accepted_if' => 'El camp :attribute ha de ser acceptat quan :other és :value.',
    'active_url' => 'El camp :attribute ha de ser una URL vàlida.',
    'after' => 'El camp :attribute ha de ser una data posterior a :date.',
    'after_or_equal' => 'El camp :attribute ha de ser una data posterior o igual a :date.',
    'alpha' => 'El camp :attribute només pot contenir lletres.',
    'alpha_dash' => 'El camp :attribute només pot contenir lletres, números, guions i subratllats.',
    'alpha_num' => 'El camp :attribute només pot contenir lletres i números.',
    'array' => 'El camp :attribute ha de ser un array.',
    'ascii' => 'El camp :attribute només pot contenir caràcters alfanumèrics de byte únic i símbols.',
    'before' => 'El camp :attribute ha de ser una data anterior a :date.',
    'before_or_equal' => 'El camp :attribute ha de ser una data anterior o igual a :date.',
    'between' => [
        'array' => 'El camp :attribute ha de tenir entre :min i :max elements.',
        'file' => 'El camp :attribute ha de ser entre :min i :max kilobytes.',
        'numeric' => 'El camp :attribute ha de ser entre :min i :max.',
        'string' => 'El camp :attribute ha de ser entre :min i :max caràcters.',
    ],
    'boolean' => 'El camp :attribute ha de ser cert o fals.',
    'can' => 'El camp :attribute conté un valor no autoritzat.',
    'confirmed' => 'La confirmació del camp :attribute no coincideix.',
    'current_password' => 'La contrasenya és incorrecta.',
    'date' => 'El camp :attribute ha de ser una data vàlida.',
    'date_equals' => 'El camp :attribute ha de ser una data igual a :date.',
    'date_format' => 'El camp :attribute ha de coincidir amb el format :format.',
    'decimal' => 'El camp :attribute ha de tenir :decimal llocs decimals.',
    'declined' => 'El camp :attribute ha de ser rebutjat.',
    'declined_if' => 'El camp :attribute ha de ser rebutjat quan :other és :value.',
    'different' => 'El camp :attribute i :other han de ser diferents.',
    'digits' => 'El camp :attribute ha de tenir :digits dígits.',
    'digits_between' => 'El camp :attribute ha de tenir entre :min i :max dígits.',
    'dimensions' => 'El camp :attribute té dimensions d\'imatge invàlides.',
    'distinct' => 'El camp :attribute té un valor duplicat.',
    'doesnt_end_with' => 'El camp :attribute no pot acabar amb un dels següents: :values.',
    'doesnt_start_with' => 'El camp :attribute no pot començar amb un dels següents: :values.',
    'email' => 'El camp :attribute ha de ser una adreça de correu electrònic vàlida.',
    'ends_with' => 'El camp :attribute ha de finalitzar amb un dels següents: :values.',
    'enum' => 'El valor seleccionat :attribute és invàlid.',
    'exists' => 'El valor seleccionat :attribute és invàlid.',
    'extensions' => 'El camp :attribute ha de tenir una de les següents extensions: :values.',
    'file' => 'El camp :attribute ha de ser un fitxer.',
    'filled' => 'El camp :attribute ha de tenir un valor.',

    'gt' => [
        'array' => 'El camp :attribute ha de tenir més de :value elements.',
        'file' => 'El camp :attribute ha de ser superior a :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser superior a :value.',
        'string' => 'El camp :attribute ha de tenir més de :value caràcters.',
    ],
    'gte' => [
        'array' => 'El camp :attribute ha de tenir :value elements o més.',
        'file' => 'El camp :attribute ha de ser superior o igual a :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser superior o igual a :value.',
        'string' => 'El camp :attribute ha de tenir :value caràcters o més.',
    ],
    'hex_color' => 'El camp :attribute ha de ser un color hexadecimal vàlid.',
    'image' => 'El camp :attribute ha de ser una imatge.',
    'in' => 'El valor seleccionat :attribute és invàlid.',
    'in_array' => 'El camp :attribute ha de ser un valor vàlid de :other.',
    'integer' => 'El camp :attribute ha de ser un enter.',
    'ip' => 'El camp :attribute ha de ser una adreça IP vàlida.',
    'ipv4' => 'El camp :attribute ha de ser una adreça IPv4 vàlida.',
    'ipv6' => 'El camp :attribute ha de ser una adreça IPv6 vàlida.',
    'json' => 'El camp :attribute ha de ser una cadena JSON vàlida.',
    'lowercase' => 'El camp :attribute ha de ser en minúscules.',
    'lt' => [
        'array' => 'El camp :attribute ha de tenir menys de :value elements.',
        'file' => 'El camp :attribute ha de ser inferior a :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser inferior a :value.',
        'string' => 'El camp :attribute ha de tenir menys de :value caràcters.',
    ],
    'lte' => [
        'array' => 'El camp :attribute no pot tenir més de :value elements.',
        'file' => 'El camp :attribute ha de ser inferior o igual a :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser inferior o igual a :value.',
        'string' => 'El camp :attribute ha de tenir menys de :value caràcters.',
    ],
    'mac_address' => 'El camp :attribute ha de ser una adreça MAC vàlida.',
    'max' => [
        'array' => 'El camp :attribute no pot tenir més de :max elements.',
        'file' => 'El camp :attribute no pot ser superior a :max kilobytes.',
        'numeric' => 'El camp :attribute no pot ser superior a :max.',
        'string' => 'El camp :attribute no pot tenir més de :max caràcters.',
    ],
    'max_digits' => 'El camp :attribute no pot tenir més de :max dígits.',
    'mimes' => 'El camp :attribute ha de ser un fitxer de tipus: :values.',
    'mimetypes' => 'El camp :attribute ha de ser un fitxer de tipus: :values.',
    'min' => [
        'array' => 'El camp :attribute ha de tenir almenys :min elements.',
        'file' => 'El camp :attribute ha de ser almenys :min kilobytes.',
        'numeric' => 'El camp :attribute ha de ser almenys :min.',
        'string' => 'El camp :attribute ha de tenir almenys :min caràcters.',
    ],

    'min_digits' => 'El camp :attribute ha de tenir almenys :min dígits.',
    'missing' => 'El camp :attribute ha de faltar.',
    'missing_if' => 'El camp :attribute ha de faltar quan :other és :value.',
    'missing_unless' => 'El camp :attribute ha de faltar llevat que :other sigui :value.',
    'missing_with' => 'El camp :attribute ha de faltar quan :values està present.',
    'missing_with_all' => 'El camp :attribute ha de faltar quan :values estan presents.',
    'multiple_of' => 'El camp :attribute ha de ser un múltiple de :value.',
    'not_in' => 'El valor seleccionat :attribute és invàlid.',
    'not_regex' => 'El format del camp :attribute és invàlid.',
    'numeric' => 'El camp :attribute ha de ser un nombre.',
    'password' => [
        'letters' => 'El camp :attribute ha de contenir com a mínim una lletra.',
        'mixed' => 'El camp :attribute ha de contenir com a mínim una lletra majúscula i una minúscula.',
        'numbers' => 'El camp :attribute ha de contenir com a mínim un nombre.',
        'symbols' => 'El camp :attribute ha de contenir com a mínim un símbol.',
        'uncompromised' => 'El valor donat :attribute ha aparegut en una fuita de dades. Si us plau, trieu un altre :attribute.',
    ],

    'present' => 'El camp :attribute ha de ser present.',
    'present_if' => 'El camp :attribute ha de ser present quan :other és :value.',
    'present_unless' => 'El camp :attribute ha de ser present llevat que :other sigui :value.',
    'present_with' => 'El camp :attribute ha de ser present quan :values està present.',
    'present_with_all' => 'El camp :attribute ha de ser present quan :values estan presents.',
    'prohibited' => 'El camp :attribute està prohibit.',
    'prohibited_if' => 'El camp :attribute està prohibit quan :other és :value.',
    'prohibited_unless' => 'El camp :attribute està prohibit llevat que :other sigui un dels valors de :values.',
    'prohibits' => 'El camp :attribute prohibeix que :other sigui present.',
    'regex' => 'El format del camp :attribute és invàlid.',
    'required' => 'El camp :attribute és obligatori.',
    'required_array_keys' => 'El camp :attribute ha de contenir entrades per a: :values.',
    'required_if' => 'El camp :attribute és obligatori quan :other és :value.',
    'required_if_accepted' => 'El camp :attribute és obligatori quan :other és acceptat.',
    'required_unless' => 'El camp :attribute és obligatori llevat que :other sigui un dels valors de :values.',
    'required_with' => 'El camp :attribute és obligatori quan :values està present.',
    'required_with_all' => 'El camp :attribute és obligatori quan :values estan presents.',
    'required_without' => 'El camp :attribute és obligatori quan :values no està present.',
    'required_without_all' => 'El camp :attribute és obligatori quan cap de :values està present.',
    'same' => 'El camp :attribute ha de coincidir amb :other.',

    'size' => [
        'array' => 'El camp :attribute ha de contenir :size elements.',
        'file' => 'El camp :attribute ha de ser :size kilobytes.',
        'numeric' => 'El camp :attribute ha de ser :size.',
        'string' => 'El camp :attribute ha de ser :size caràcters.',
        'regex' => 'La grandària ha de ser en format numèric, amb opció d\'incloure "x" per a dimensions i unitat de mesura (cm o mm) al final.',
    ],
    'starts_with' => 'El camp :attribute ha de començar amb un dels següents: :values.',
    'string' => 'El camp :attribute ha de ser una cadena.',
    'timezone' => 'El camp :attribute ha de ser una zona vàlida.',
    'unique' => 'El :attribute ja s\'ha agafat.',
    'uploaded' => 'El :attribute no s\'ha pogut pujar.',
    'uppercase' => 'El camp :attribute ha de ser en majúscules.',
    'url' => 'El camp :attribute ha de ser una URL vàlida.',
    'ulid' => 'El camp :attribute ha de ser un ULID vàlid.',
    'uuid' => 'El camp :attribute ha de ser un UUID vàlid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'image' => 'imatge',
        'social_networks' => 'xarxes socials',
        'first_name' => 'nom',
        'last_name' => 'cognom',
        'email' => 'correu electrònic',
        'biography' => 'biografia',
        'password' => 'contrasenya',
        'phone' => 'telèfon',
        'role_id' => 'rol',
        'date' => 'data',
        'phone_number' => 'telèfon',
        'zip_code' => 'codi postal',
        'city' => 'ciutat',
        'country' => 'país',
        'status_id' => 'estat de la comanda',
        'payment_method' => 'mètode de pagament',
        'reference' => 'referència',
        'tracking_id' => 'codi d\'enviament',
        'products' => 'llibre',
        'size' => 'dimensions'
    ],

];
