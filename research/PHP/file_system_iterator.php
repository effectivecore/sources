<?php

namespace effcore;

use FilesystemIterator;
use SplFileInfo;
use UnexpectedValueException;

class test_iterator {

    static function test_file_system_iterator() {
        try {
            $iterator = new FilesystemIterator(dirname(__FILE__),
                            FilesystemIterator::UNIX_PATHS |
                            FilesystemIterator::SKIP_DOTS);
            foreach ($iterator as $c_info) {
                if ($c_info instanceof SplFileInfo) {
                    print $c_info->getATime    ();
                    print $c_info->getCTime    ();
                    print $c_info->getMTime    ();
                    print $c_info->getBasename ();
                    print $c_info->getExtension();
                    print $c_info->getFilename ();
                    print $c_info->getGroup    ();
                    print $c_info->getInode    ();
                    print $c_info->getOwner    ();
                    print $c_info->getPath     ();
                    print $c_info->getPathname ();
                    print $c_info->getPerms    ();
                    print $c_info->getRealPath ();
                    print $c_info->getSize     ();
                    print $c_info->getType     (); # file | dir
                    print $c_info->isDir       () ? 'dir'        : '';
                    print $c_info->isExecutable() ? 'executable' : '';
                    print $c_info->isFile      () ? 'file'       : '';
                    print $c_info->isLink      () ? 'link'       : '';
                    print $c_info->isReadable  () ? 'readable'   : '';
                    print $c_info->isWritable  () ? 'writable'   : '';
                    if ($c_info->isFile()) {
                        $c_object = $c_info->openFile();
                        # …
                    }
                }
            }
        } catch (UnexpectedValueException $e) {
            return false;
        }
    }

}
