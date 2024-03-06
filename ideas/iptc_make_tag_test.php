<?php

namespace effcore;

$content = iptcembed(media::iptc_make_tag(media::iptc_special_instructions, 'text'), 'test.jpg');
$fp = fopen('test-result.jpg', 'wb');
fwrite($fp, $content);
fclose($fp);
