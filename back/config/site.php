<?php
  return [
    'url'     => env('SITE_URL'),
    
    'title'   => env('SITE_TITLE'),

    'posfix'  => env('SITE_POSFIX'),

    'client'  => [
      'name'          => env('SITE_CLIENT_NAME'),

      'email'         => env('SITE_CLIENT_EMAIL'),

      'full_address'  => env('SITE_CLIENT_FULL_ADDRESS'),

      'phone'         => env('SITE_CLIENT_PHONE'),

      'mobile'        => env('SITE_CLIENT_MOBILE'),
    ]
  ];