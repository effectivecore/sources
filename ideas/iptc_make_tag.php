<?php

namespace effcore;

abstract class media {

    const iptc_object_name = 5;
    const iptc_edit_status = 7;
    const iptc_priority = 10;
    const iptc_category = 15;
    const iptc_supplemental_category = 20;
    const iptc_fixture_identifier = 22;
    const iptc_keywords = 25;
    const iptc_release_date = 30;
    const iptc_release_time = 35;
    const iptc_special_instructions = 40;
    const iptc_reference_service = 45;
    const iptc_reference_date = 47;
    const iptc_reference_number = 50;
    const iptc_created_date = 55;
    const iptc_created_time = 60;
    const iptc_originating_program = 65;
    const iptc_program_version = 70;
    const iptc_object_cycle = 75;
    const iptc_byline = 80;
    const iptc_byline_title = 85;
    const iptc_city = 90;
    const iptc_province_state = 95;
    const iptc_country_code = 100;
    const iptc_country = 101;
    const iptc_original_transmission_reference = 103;
    const iptc_headline = 105;
    const iptc_credit = 110;
    const iptc_source = 115;
    const iptc_copyright_string = 116;
    const iptc_caption = 120;
    const iptc_local_caption = 121;

    static function iptc_make_tag($key, $value) {
        $length = strlen($value);
        $result = chr(0x1c).chr(0x2).chr($key);
        if ($length < 2 ** 15)
             $result.= chr($length >> 8).chr($length & 0xff);
        else $result.= chr(0x80).chr(0x4).
                       chr(($length >> 24) & 0xff).
                       chr(($length >> 16) & 0xff).
                       chr(($length >>  8) & 0xff).
                       chr(($length      ) & 0xff);
        return $result.$value;
    }

}
