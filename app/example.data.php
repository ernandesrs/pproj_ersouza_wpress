<?php

$siteUrl = "";
$siteAssetsUrl = $siteUrl . "/assets";

return [
    "config" => [
        // local or deploy
        "siteEnv" => "local",
        "siteName" => "",
        "siteUrl" => $siteUrl,
        "siteAssetsUrl" => $siteAssetsUrl,

        "siteLogo" => $siteAssetsUrl . "/img/logo.png",
        "siteFavicon" => $siteAssetsUrl . "/img/favicon.png",

        "header" => [
            "nav" => [
                [
                    "text" => "Início",
                    "title" => "Página inicial",
                    "icon" => "bi bi-house",
                    "url" => $siteUrl,
                    "target" => "_self"
                ],
                [
                    "text" => "Habilidades",
                    "title" => "Habilidades e tecnologias",
                    "icon" => "bi bi-award",
                    "url" => $siteUrl . "/#skills",
                    "target" => "_self"
                ],
                [
                    "text" => "Portfólio",
                    "title" => "Trabalhos concluídos",
                    "icon" => "bi bi-briefcase",
                    "url" => $siteUrl . "/#portfolio",
                    "target" => "_self"
                ],
                [
                    "text" => "Contato",
                    "title" => "Entrar em contato",
                    "icon" => "bi bi-envelope",
                    "url" => $siteUrl . "/#contact",
                    "target" => "_self",
                    "contrast" => true
                ],
            ]
        ],
    ],

    "home" => [
        "banner" => [
            "title" => "Desenvolvedor de sites e sistemas web",
            "desc" => "Olá, me chamo Lorem ipsum, sou um lorem dolor web fulllorem e estou pronto para criar o seu ipsum ou sit web.",
            "buttons" => [
                [
                    "text" => "Contato",
                    "title" => "Entrar em contato",
                    "icon" => "bi bi-envelope",
                    "url" => $siteUrl . "/#contact",
                    "target" => "_self",
                    "contrast" => true
                ],
                [
                    "text" => "Habilidades",
                    "title" => "Habilidades e tecnologias",
                    "icon" => "bi bi-award",
                    "url" => $siteUrl . "/#skills",
                    "target" => "_self"
                ],
                [
                    "text" => "Portfólio",
                    "title" => "Trabalhos concluídos",
                    "icon" => "bi bi-briefcase",
                    "url" => $siteUrl . "/#portfolio",
                    "target" => "_self"
                ]
            ],
            "image" => $siteAssetsUrl . "/img/banner-ilustration.png"
        ],

        "skills" => [
            "title" => "Habilidades e Tecnologias Que Utilizo",
            "skills" => [
                [
                    "title" => "Frontend",
                    "icon" => "bi bi-grid-1x2-fill",
                    "desc" => "Habilidades no frontend com HTML, CSS3(Bootstrap, SASS) e JavaScript(Vue JS, Inertia JS)."
                ],
                [
                    "title" => "Backend",
                    "icon" => "bi bi-database-fill",
                    "desc" => "Habilidades no backend com PHP, Laravel e banco de dados com MySQL."
                ],
                [
                    "title" => "Outros",
                    "icon" => "bi bi-three-dots-vertical",
                    "desc" => "Possuo bons conhecimentos em TailwindCSS, jQuery e Figma."
                ]
            ]
        ],

        "portfolio" => [
            "title" => "Alguns trabalhos que já concluí",
            "jobs" => [
                [
                    "image" => $siteAssetsUrl . "/img/print-portfolio.png",
                    "title" => "Porfólio",
                    "desc" => "O projeto é este portfólio digital. Foram utilizados HTML, CSS com Bootstrap 4 e SASS; e Javascript.",
                    "source_url" => "https://github.com/ernandesrs/pproj_front_ersportfolio",
                    "preview_url" => "https://ernandesrs.github.io/pproj_front_ersportfolio"
                ],
                [
                    "image" => $siteAssetsUrl . "/img/print-padmin.png",
                    "title" => "PADMIN",
                    "desc" => "Foram utilizados Vue JS 3 com Inertia JS e Bootstrap 5 com SASS no frontend; no backend foi utilizado PHP com Laravel 8.",
                    "source_url" => "https://github.com/ernandesrs/pproj_padmin",
                    "preview_url" => "https://padmin-demo.ersouza.com"
                ],
                [
                    "image" => $siteAssetsUrl . "/img/print-panel.png",
                    "title" => "Painel Administrativo",
                    "desc" => "Neste painel foram utilizados HTML, CSS com Bootstrap 4 e SASS; e JavaScript com jQuery no frontend. No backend foi utilizado PHP com Laravel 8.",
                    "source_url" => "https://github.com/ernandesrs/pproj_laravel",
                    "preview_url" => ""
                ]
            ]
        ],

        "contact" => [
            "title" => "Contato e Contratação",
            "profiles" => [
                [
                    "icon" => "bi bi-linkedin",
                    "title" => "Linkedin",
                    "text" => "/ernandesrsouza",
                    "url" => "https://linkedin.com/in/ernandesrsouza"
                ],
                [
                    "icon" => "bi bi-github",
                    "title" => "Github",
                    "text" => "/ernandesrs",
                    "url" => "https://github.com/ernandesrs"
                ],
                [
                    "icon" => "bi bi-envelope-fill",
                    "title" => "E-mail",
                    "text" => "example@example.com",
                    "url" => "mailto:example@example.com"
                ]
            ],
            "freelance" => [
                [
                    "title" => "Workana",
                    "text" => "Workana",
                    "url" => "https://workana.com/"
                ],
                [
                    "title" => "Freelancer",
                    "text" => "Freelancer",
                    "url" => "https://freelancer.com/"
                ],
                [
                    "title" => "Vinte Pila",
                    "text" => "Vinte Pila",
                    "url" => "https://vintepila.com/"
                ],
            ]
        ]
    ]
];