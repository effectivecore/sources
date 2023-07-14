#!/usr/bin/env bash

cd ../
pass=12345
salt=$(grep -o "\['salt'\] = '[a-f0-9]\{40\}" dynamic/data/data--changes.php | sed "s/\['salt'\] = '//g")
result=$($pass$salt | shasum -a 256)
echo $result