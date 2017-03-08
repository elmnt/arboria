<?php if(!defined('KIRBY')) exit ?>

title: Products
pages: true
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
  intro:
    label: Intro
    type:  textarea
    icon:  file-text-o
  introcta:
    label: Intro CTA (button)
    type:  text
    icon: info-circle
  purchaseOptions:
    label: Purchase Options descriptive text that appears on ALL product pages, under the Purchase Options title
    type: text
    icon: info-circle
  text:
    label: Text
    type:  textarea
    icon:  file-text-o
