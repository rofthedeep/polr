<?php

namespace App\Factories;

use App\Models\Campaign;
use App\Helpers\CryptoHelper;
use App\Helpers\LinkHelper;


class CampaignFactory
{
    public static function createCampaign($value, $name)
    {
        /**
         * Given parameters needed to create a link, generate appropriate ending and
         * return formatted link.
         *
         * @param string $value
         * @param string $string

         */

        $campaign = new Campaign();
        $campaign->value = $value;
        $campaign->name = $name;


        $campaign->save();

        return $name;
    }

}
