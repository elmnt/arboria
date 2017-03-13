<?php if(!defined('KIRBY')) exit ?>

title: Default
pages: true
  template:
    - product
files: true
fields:

  pageMeta:
    label: Page Meta
    type: headline
  title:
    label: Title
    type:  text
  description:
    label: Description
    type:  text
    icon: info-circle

  pageContent:
    label: Page Content
    type: headline
  text:
    label: Text
    type:  textarea
    icon:  file-text-o
  imageCaption:
    label: Image Caption
    type:  text
    icon: info-circle
  imageAltTag:
    label: Image Alt Tag
    type:  text
    icon: info-circle
