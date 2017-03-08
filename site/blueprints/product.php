<?php if(!defined('KIRBY')) exit ?>

title: Product
pages: true
files:
  sortable: true
  size: 20000000
fields:

  pageMeta:
    label: Page Meta
    type: headline
  title:
    label: Title
    type:  text
  date:
    label: Date
    type:  text
  price:
    label: Price
    type:  text
  Description:
    label: Description
    type:  text
  PartNumber:
    label: Part Number
    type:  text
  UPC:
    label: UPC Code
    type:  text
  subcatimage:
    label: Image for the sub-category page
    type: image

  pageContent:
    label: Page Content
    type: headline

  overview:
    label: Product Overview
    type:  textarea
    icon:  file-text-o

  buyOnline:
    label: Buy Online links
    type: structure
    style: table
    entry: >
      URL: {{url}}<br />
      Link Text: {{linktext}}<br />
      Logo: {{logo}}
    fields:
      url:
        label: Link to Product
        type: text
      linktext:
        label: Link Text
        type: text
      logo:
        label: Logo
        type: image
      logolink:
        label: Logo Link
        type: text

  buyLocal:
    label: Buy Local
    type:  textarea
    icon:  file-text-o

  productReviews:
    label: Product Reviews
    type: structure
    style: table
    fields:
      reviewStars:
        label: How Many Stars
        type: select
        options:
          1: 1
          2: 2
          3: 3
          4: 4
          5: 5
      reviewTitle:
        label: Review Title
        type:  text
        icon: info-circle
      reviewName:
        label: Reviewer Name
        type:  text
        icon: info-circle
      reviewFrom:
        label: Reviewer City, State
        type:  text
        icon: info-circle
      reviewText:
        label: Review Text
        type:  textarea
        icon:  file-text-o

  # START: Related Product Groups
  # ############################################
  # START: Structures

  relProductsArbors:
      label: Related Products - Structures/Arbors
      type: checkboxes
      options: query
      query:
          page:  products/structures/arbors
          fetch: visibleChildren

  relProductsTrellis:
      label: Related Products - Structures/Trellis
      type: checkboxes
      options: query
      query:
          page:  products/structures/trellis
          fetch: visibleChildren

  relProductsScreens:
      label: Related Products - Structures/Screens
      type: checkboxes
      options: query
      query:
          page:  products/structures/screens
          fetch: visibleChildren

  # END: Structures
  # START: Grow at Home

  relProductsPlanters:
      label: Related Products - Grow at Home/Planters
      type: checkboxes
      options: query
      query:
          page:  products/grow-at-home/planters
          fetch: visibleChildren

  relProductsPottingBenches:
      label: Related Products - Grow at Home/Potting Benches
      type: checkboxes
      options: query
      query:
          page:  products/grow-at-home/potting-benches
          fetch: visibleChildren

  relProductsCaddies:
      label: Related Products - Grow at Home/Caddies
      type: checkboxes
      options: query
      query:
          page:  products/grow-at-home/caddies
          fetch: visibleChildren

  # END: Grow at Home
  # START: Furniture

  relProductsChairs:
      label: Related Products - Furniture/Chairs
      type: checkboxes
      options: query
      query:
          page:  products/furniture/chairs
          fetch: visibleChildren

  relProductsBenches:
      label: Related Products - Furniture/Benches
      type: checkboxes
      options: query
      query:
          page:  products/furniture/benches
          fetch: visibleChildren

  relProductsTables:
      label: Related Products - Furniture/Tables
      type: checkboxes
      options: query
      query:
          page:  products/furniture/tables
          fetch: visibleChildren

  relProductsSets:
      label: Related Products - Furniture/Sets
      type: checkboxes
      options: query
      query:
          page:  products/furniture/sets
          fetch: visibleChildren

  # END: Furniture

  # ############################################
  # END: Related Product Groups
