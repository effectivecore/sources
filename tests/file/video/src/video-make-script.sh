#!/usr/bin/env bash

cd "$(dirname "$0")"

ffmpeg -i video-without-audio.mp4 -i ../../audio/audio.mp3 -c:v copy -c:a aac -map 0:v:0 -map 1:a:0 ../video.mp4