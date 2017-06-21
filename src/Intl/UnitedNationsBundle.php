<?php

namespace AppBundle\Intl;

use Collator;
use Symfony\Component\Intl\Intl;

class UnitedNationsBundle
{
    private static $countries;

    /**
     * Returns the list of the United Nations member states translated in a given locale.
     */
    public static function getCountries(?string $locale = 'fr'): array
    {
        if (self::$countries) {
            return self::$countries;
        }

        $intlCountries = Intl::getRegionBundle()->getCountryNames($locale);
        $names = [];

        foreach (self::$unitedNationsCodes as $code) {
            $names[$code] = $intlCountries[$code];
        }

        // Sort by name
        (new Collator($locale))->asort($names);

        return self::$countries = $names;
    }

    /**
     * Returns whether the given code is a valid United Nations country.
     */
    public static function isCountryCode(string $code): bool
    {
        return in_array($code, self::$unitedNationsCodes, true);
    }

    private static $unitedNationsCodes = [
        'AD',
        'AE',
        'AF',
        'AG',
        'AL',
        'AM',
        'AO',
        'AR',
        'AT',
        'AU',
        'AZ',
        'BA',
        'BB',
        'BD',
        'BE',
        'BF',
        'BG',
        'BH',
        'BI',
        'BJ',
        'BN',
        'BO',
        'BR',
        'BS',
        'BT',
        'BW',
        'BY',
        'BZ',
        'CA',
        'CD',
        'CF',
        'CG',
        'CH',
        'CI',
        'CK',
        'CL',
        'CM',
        'CN',
        'CO',
        'CR',
        'CU',
        'CV',
        'CY',
        'CZ',
        'DE',
        'DJ',
        'DK',
        'DM',
        'DO',
        'DZ',
        'EC',
        'EE',
        'EG',
        'ER',
        'ES',
        'ET',
        'FI',
        'FJ',
        'FM',
        'FR',
        'GA',
        'GB',
        'GD',
        'GE',
        'GH',
        'GM',
        'GN',
        'GQ',
        'GR',
        'GT',
        'GW',
        'GY',
        'HN',
        'HR',
        'HT',
        'HU',
        'ID',
        'IE',
        'IL',
        'IN',
        'IQ',
        'IR',
        'IS',
        'IT',
        'JM',
        'JO',
        'JP',
        'KE',
        'KG',
        'KH',
        'KI',
        'KM',
        'KN',
        'KP',
        'KR',
        'KW',
        'KZ',
        'LA',
        'LB',
        'LC',
        'LI',
        'LK',
        'LR',
        'LS',
        'LT',
        'LU',
        'LV',
        'LY',
        'MA',
        'MC',
        'MD',
        'ME',
        'MG',
        'MH',
        'MK',
        'ML',
        'MM',
        'MN',
        'MR',
        'MT',
        'MU',
        'MV',
        'MW',
        'MX',
        'MY',
        'MZ',
        'NA',
        'NE',
        'NG',
        'NI',
        'NL',
        'NO',
        'NP',
        'NR',
        'NZ',
        'OM',
        'PA',
        'PE',
        'PG',
        'PH',
        'PK',
        'PL',
        'PS',
        'PT',
        'PW',
        'PY',
        'QA',
        'RO',
        'RS',
        'RU',
        'RW',
        'SA',
        'SB',
        'SC',
        'SD',
        'SE',
        'SG',
        'SI',
        'SK',
        'SL',
        'SM',
        'SN',
        'SO',
        'SR',
        'SS',
        'SS',
        'ST',
        'SV',
        'SY',
        'SZ',
        'TD',
        'TG',
        'TH',
        'TJ',
        'TL',
        'TM',
        'TN',
        'TO',
        'TR',
        'TT',
        'TV',
        'TW',
        'TZ',
        'UA',
        'UG',
        'US',
        'UY',
        'UZ',
        'VA',
        'VC',
        'VE',
        'VN',
        'VU',
        'WS',
        'XK',
        'YE',
        'ZA',
        'ZM',
        'ZW',
    ];
}
