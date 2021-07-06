<?php

return [
    //theme
    'theme' => 'theme2',

    // admin menu
    'admin_menu' => [
        [
            "name" => "Dashboard",
            "id" => "dashboard",
            "icon" => "icon-graph",
            "url" => "/backend/dashboard",
            "permission" => "Dashboard",
            "children" => []
        ],
        [
            "name" => "My Profile",
            "id" => "my_profile",
            "icon" => "fa fa-user-circle",
            "url" => "/backend/profile/personal-info",
            "permission" => "My Profile",
            "children" => []
        ],
        [
            "name" => "Cms",
            "id" => "cms",
            "icon" => "fa fa-cogs",
            "url" => "",
            "permission" => "Cms",
            "children" => [
                [
                    "name" => "Banner",
                    "id" => "banner",
                    "icon" => "",
                    "url" => "/backend/banner",
                    "permission" => "Banner",
                ],
                [
                    "name" => "Why Us",
                    "id" => "why_us",
                    "icon" => "",
                    "url" => "/backend/why-us",
                    "permission" => "Why Us",
                ],
                [
                    "name" => "FAQ",
                    "id" => "faq",
                    "icon" => "",
                    "url" => "/backend/faq",
                    "permission" => "Faq",
                ],
                [
                    "name" => "Privacy Policy",
                    "id" => "privacy_policy",
                    "icon" => "",
                    "url" => "/backend/privacy-policy",
                    "permission" => "Privacy Policy",
                ],
                [
                    "name" => "page",
                    "id" => "page",
                    "icon" => "",
                    "url" => "/backend/page",
                    "permission" => "Page",
                ],
            ]
        ],
        [
            "name" => "Hotels",
            "id" => "hotels",
            "icon" => "fas fa-hotel",
            "url" => "/backend/hotel",
            "permission" => "Hotels",
            "children" => []
        ],
        [
            "name" => "Bookings",
            "id" => "bookings",
            "icon" => "fas fa-book",
            "url" => "/backend/booking",
            "permission" => "Bookings",
            "children" => []
        ],
        [
            "name" => "User Controls",
            "id" => "user_controls",
            "icon" => "fa fa-user-cog",
            "url" => "/backend/admin",
            "permission" => "User Controls",
            "children" => [
                [
                    "name" => "Admin",
                    "id" => "admin",
                    "icon" => "",
                    "url" => "/backend/admin",
                    "permission" => "Admin",
                ]
            ]
        ],
        [
            "name" => "App Settings",
            "id" => "app_settings",
            "icon" => "fa fa-globe",
            "url" => "",
            "permission" => "App Settings",
            "children" => [
                [
                    "name" => "Site",
                    "id" => "site",
                    "icon" => "",
                    "url" => "/backend/site",
                    "permission" => "Site",
                ],
                [
                    "name" => "Contact",
                    "id" => "contact",
                    "icon" => "",
                    "url" => "/backend/contact",
                    "permission" => "Contact",
                ],
                [
                    "name" => "Seo",
                    "id" => "seo",
                    "icon" => "",
                    "url" => "/backend/seo",
                    "permission" => "Seo",
                ],
                [
                    "name" => "Api",
                    "id" => "api",
                    "icon" => "",
                    "url" => "/backend/api",
                    "permission" => "Api",
                ]
            ]
        ]
    ],
    // front menu
    'front_menu' => [
        [
            "name" => "Home",
            "id" => "home",
            "icon" => "",
            "url" => "/",
            "permission" => "",
            "children" => []
        ],
        [
            "name" => "Destination",
            "id" => "destination",
            "icon" => "",
            "url" => "/destination",
            "permission" => "",
            "children" => []
        ],
        [
            "name" => "FAQ",
            "id" => "faq",
            "icon" => "",
            "url" => "/faq",
            "permission" => "",
            "children" => []
        ],
        [
            "name" => "Contact",
            "id" => "contact",
            "icon" => "",
            "url" => "/contact",
            "permission" => "",
            "children" => []
        ],
    ],
    // profile menu
    'profile_menu' => [
        [
            "name" => "Personal Info",
            "id" => "personal_info",
            "icon" => "icon-profile",
            "url" => "/backend/profile/personal-info",
            "permission" => "personal_info",
            "children" => []
        ],
        [
            "name" => "Residential Info",
            "id" => "residential_info",
            "icon" => "icon-address-book",
            "url" => "/backend/profile/residential-info",
            "permission" => "residential_info",
            "children" => []
        ],
        [
            "name" => "Account Info",
            "id" => "account_info",
            "icon" => "icon-user",
            "url" => "/backend/profile/account-info",
            "permission" => "account_info",
            "children" => []
        ],
        [
            "name" => "Password Change",
            "id" => "password_change",
            "icon" => "icon-key",
            "url" => "/backend/profile/password-change",
            "permission" => "password_change",
            "children" => []
        ],
    ],
    // genders
    'genders' => [
        'Male' => 'Male',
        'Female' => 'Female',
        'Others' => 'Others'
    ],
    // blood groups
    "blood_groups" => [
        "A (+ve)" => "A (+ve)",
        "A (-ve)" => "A (-ve",
        "B (+ve)" => "B (+ve)",
        "B (-ve" => "B (-ve",
        "O (+ve)" => "O (+ve)",
        "O (-ve" => "O (-ve",
        "AB (+ve)" => "AB (+ve)",
        "AB (-ve" => "AB (-ve",
    ],
    "continents" => [
        "asia" => "Asia",
        "north-america" => "North America",
        "south-america" => "South America",
        "africa" => "Africa",
        "europe" => "Europe",
        "australia" => "Australia",
    ],
    // media collection
    'media_collection' => [
        'banner' => [
            'image' => 'banner_image',
        ],
        'page' => [
            'image' => 'page_feature_image',
        ],
        'hotel' => [
            'feature_image' => 'hotel_feature_image',
            'slider_images' => 'hotel_slider_images',
        ],
        'user' => [
            'avatar' => 'user_avatar',
        ],
        'user_personal_info' => [
            'avatar' => 'user_personal_info_avatar'
        ],
        'setting_site' => [
            'logo' => 'setting_site_logo',
            'logo_light' => 'setting_site_logo_light',
            'favicon' => 'setting_site_favicon',
            'breadcrumb_image' => 'setting_site_breadcrumb_image',
        ],
    ],
    // default image
    'image' => [
        'theme1' => [
            'default' => [
                'logo' => '/front/theme1/images/default/logo.png',
                'logo_light' => '/front/theme1/images/default/logo-light.png',
                'favicon' => '/front/theme1/images/default/favicon.png',
                'avatar_male' => '/front/theme1/images/default/avatar-male.jpeg',
                'avatar_female' => '/front/theme1/images/default/avatar-female.png',
                'preview_image' => '/front/theme1/images/default/preview.png',
                'breadcrumb_image' => '/front/theme1/images/default/breadcrumb.jpg',
                'banner_image' => '/front/theme1/images/default/banner.jpg',
                'footer_image' => '/front/theme1/images/default/footer.jpg',
            ]
        ],
        'theme2' => [
            'default' => [
                'logo' => '/front/theme2/images/default/logo.png',
                'logo_light' => '/front/theme2/images/default/logo-light.png',
                'favicon' => '/front/theme2/images/default/favicon.png',
                'avatar_male' => '/front/theme2/images/default/avatar-male.jpeg',
                'avatar_female' => '/front/theme2/images/default/avatar-female.png',
                'preview_image' => '/front/theme2/images/default/preview.png',
                'breadcrumb_image' => '/front/theme2/images/default/breadcrumb.jpg',
                'banner_image' => '/front/theme2/images/default/banner.jpg',
                'footer_image' => '/front/theme2/images/default/footer.jpg',
            ]
        ]
    ]
];
