<?php if(!defined('KIRBY')) exit ?>

title: Site
pages:
  template:
    - default
files: true
fields:

  siteMeta:
    label: Site Meta
    type: headline
  title:
    label: Site title
    type:  text
  description:
    label: Site description
    type:  text
    icon:  info-circle

  globalInfo:
    label: Global Info
    type: headline
  googleDrive:
    label: Google Drive Link Text in Footer
    type:  text
    icon:  info-circle
  info:
    label: Site Info
    type:  textarea
    icon:  file-text-o
