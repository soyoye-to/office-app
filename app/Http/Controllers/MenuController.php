<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUsers;
use App\Models\PermissionUser;

class MenuController extends Controller
{
    public function Menu(Request $request) {
          
          $menu = [];  
            $check_role = RoleUsers::join("roles", "role_users.role_id", "roles.id")
            ->join("roles_and_permissions as rp", "roles.id", "rp.roles_id")
            ->join("permissions", "rp.permissions_id", "permissions.id")
            ->where("role_users.user_id", auth()->user()->id)
            ->selectRaw("permission_name")->get()->toArray();

            $check_direct_permission = PermissionUser::join("permissions", "permission_users.permissions_id", "permissions.id")
            ->where("permission_users.users_id", auth()->user()->id)
            ->selectRaw("permission_name")->get()->toArray();
            
            // dd($check_direct_permission);
            // && in_array("Allocate Users", $check_direct_permission )
         foreach ($check_role as $value) {
            switch ($value["permission_name"]) {
                case 'Manager':
                    $menu[] = [
                        "icon" => "fa-sliders-h icon-color",
                        "title" => "Setup",
                        "sub_menu" => [
                            [
                                "icon" => "fa-users",
                                "title" => "User Manager",
                                "sub_menu_2" => 
                                [
                                    [
                                        "icon" => " fas fa-circle text-success",
                                        "title" => "Staff Manager",
                                        "link" => "/staffManager"
                                    ],
                                    [
                                        "icon" => "fas fa-circle text-success",
                                        "title" => "Vendors Manager",
                                        "link" => "/vendorManager"
                                    ],
                                ]
                            ],
                            [
                                "icon" => "fas fa-search-location",
                                "title" => "Allocations",
                                "sub_menu_2" => 
                                [
                                    [
                                        "icon" => "far fa-circle text-success",
                                        "title" => "Department Allocation",
                                        "link" => "/departmentManager"
                                    ],
                                    [
                                        "icon" => "far fa-circle text-success",
                                        "title" => "Position Allocation",
                                        "link" => "/positionManager"
                                    ]
                                ]
                            ],
                            [
                                "icon" => "fafafa",
                                "title" => "Roles And Permission",
                                "link" => "/Roles-and-Permission",
                                "sub_menu_2" => []
                            ]

                        ]
                    ];
                    $menu[] = [
                        // "line" => "line",
                        "icon" => "fa-file-invoice-dollar",
                        "title" => "Accounting",
                        "sub_menu" => [
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Add payment heads",
                                "link" => "/reqTitle",
                                "sub_menu_2" => []
                            ],
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Requisition",
                                "link" => "/requisition",
                                "sub_menu_2" => []
                            ],
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Account Statement",
                                "link" => "/account_statement",
                                "sub_menu_2" => []
                            ],
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Analytics",
                                "link" => "/requisition_analytics",
                                "sub_menu_2" => []
                            ],
                            
                            

                        ]
                    ];
                    $menu[] = [
                        "icon" => "fa-thumbtack",
                        "title" => "Attendance",
                        "sub_menu" => [
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Attendance",
                                "link" => "/attendance",
                                "sub_menu_2" => []
                            ],
                        ]
                    ];
                    $menu[] = [
                        "icon" => "fa-luggage-cart",
                        "title" => "Leave",
                        "sub_menu" => [
                            [
                                "icon" => "fa-circle text-success",
                                "title" => "Leave",
                                "link" => "/leave",
                                "sub_menu_2" => []
                            ],
                        ]
                    ];
                    $menu[] = [
                        "icon" => "fa-calendar-check",
                        "title" => "Events Manager",
                        "sub_menu" => [
                            [
                                "icon" => "fa-circle text-success",
                                "title" => "Events",
                                "link" => "/events",
                                "sub_menu_2" => []
                            ],
                        ]
                    ];
                    
                break;
                case 'Super Admin':
                    $menu[] = [
                        "icon" => "fa-sliders-h icon-color",
                        "title" => "Setup",
                        "sub_menu" => [
                            [
                                "icon" => "fa-users",
                                "title" => "User Manager",
                                "sub_menu_2" => 
                                [
                                    [
                                        "icon" => " fas fa-circle text-success",
                                        "title" => "Staff Manager",
                                        "link" => "/staffManager"
                                    ],
                                    [
                                        "icon" => "fas fa-circle text-success",
                                        "title" => "Vendors Manager",
                                        "link" => "/vendorManager"
                                    ],
                                ]
                            ],
                            [
                                "icon" => "fas fa-search-location",
                                "title" => "Allocations",
                                "sub_menu_2" => 
                                [
                                    [
                                        "icon" => "far fa-circle text-success",
                                        "title" => "Department Allocation",
                                        "link" => "/departmentManager"
                                    ],
                                    [
                                        "icon" => "far fa-circle text-success",
                                        "title" => "Position Allocation",
                                        "link" => "/positionManager"
                                    ]
                                ]
                            ],
                            [
                                "icon" => "fafafa",
                                "title" => "Roles And Permission",
                                "link" => "/Roles-and-Permission",
                                "sub_menu_2" => []
                            ]

                        ]
                    ];
                    $menu[] = [
                        // "line" => "line",
                        "icon" => "fa-file-invoice-dollar",
                        "title" => "Accounting",
                        "sub_menu" => [
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Add payment heads",
                                "link" => "/reqTitle",
                                "sub_menu_2" => []
                            ],
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Requisition",
                                "link" => "/requisition",
                                "sub_menu_2" => []
                            ],
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Account Statement",
                                "link" => "/account-statement",
                                "sub_menu_2" => []
                            ],
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Analytics",
                                "link" => "/requisition_analytics",
                                "sub_menu_2" => []
                            ],
                            
                            

                        ]
                    ];
                    $menu[] = [
                        "icon" => "fa-thumbtack",
                        "title" => "Attendance",
                        "sub_menu" => [
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Attendance",
                                "link" => "/attendance",
                                "sub_menu_2" => []
                            ],
                        ]
                    ];
                    $menu[] = [
                        "icon" => "fa-luggage-cart",
                        "title" => "Leave",
                        "sub_menu" => [
                            [
                                "icon" => "fa-circle text-success",
                                "title" => "Leave",
                                "link" => "/leave",
                                "sub_menu_2" => []
                            ],
                        ]
                    ];
                    $menu[] = [
                        "icon" => "fa-calendar-check",
                        "title" => "Events Manager",
                        "sub_menu" => [
                            [
                                "icon" => "fa-circle text-success",
                                "title" => "Events",
                                "link" => "/events",
                                "sub_menu_2" => []
                            ],
                        ]
                    ];
                    
                break;

                case 'Staff':
                    foreach ($check_direct_permission as  $value) {
                        if ($value["permission_name"] == "Manage users" && in_array("Allocate Users", array_column($check_direct_permission, "permission_name"))) {
                            $menu[] = [
                                "icon" => "fa-sliders-h icon-color",
                                "title" => "Setup",
                                "sub_menu" => [
                                    [
                                        "icon" => "fa-users",
                                        "title" => "User Manager",
                                        "sub_menu_2" => 
                                        [
                                            [
                                                "icon" => " fas fa-circle text-success",
                                                "title" => "Staff Manager",
                                                "link" => "/staffManager"
                                            ],
                                            [
                                                "icon" => "fas fa-circle text-success",
                                                "title" => "Vendors Manager",
                                                "link" => "/vendorManager"
                                            ],
                                        ]
                                    ],
                                    [
                                        "icon" => "fas fa-search-location",
                                        "title" => "Allocations",
                                        "sub_menu_2" => 
                                        [
                                            [
                                                "icon" => "far fa-circle text-success",
                                                "title" => "Department Allocation",
                                                "link" => "/departmentManager"
                                            ],
                                            [
                                                "icon" => "far fa-circle text-success",
                                                "title" => "Position Allocation",
                                                "link" => "/positionManager"
                                            ]
                                        ]
                                    ],
        
                                ]
                            ]; 
                            break;
                        }elseif ($value["permission_name"] == "Manage users"){
                            $menu[] = [
                                "icon" => "fa-sliders-h icon-color",
                                "title" => "Setup",
                                "sub_menu" => [
                                    [
                                        "icon" => "fa-users",
                                        "title" => "User Manager",
                                        "sub_menu_2" => 
                                        [
                                            [
                                                "icon" => " fas fa-circle text-success",
                                                "title" => "Staff Manager",
                                                "link" => "/staffManager"
                                            ],
                                            [
                                                "icon" => "fas fa-circle text-success",
                                                "title" => "Vendors Manager",
                                                "link" => "/vendorManager"
                                            ],
                                        ]
                                    ],
                                ]
                            ]; 
                        } elseif ($value["permission_name"] == "Allocate Users"){
                            $menu[] = [
                                "icon" => "fa-sliders-h icon-color",
                                "title" => "Setup",
                                "sub_menu" => [
                                    [
                                        "icon" => "fas fa-search-location",
                                        "title" => "Allocations",
                                        "sub_menu_2" => 
                                        [
                                            [
                                                "icon" => "far fa-circle text-success",
                                                "title" => "Department Allocation",
                                                "link" => "/departmentManager"
                                            ],
                                            [
                                                "icon" => "far fa-circle text-success",
                                                "title" => "Position Allocation",
                                                "link" => "/positionManager"
                                            ]
                                        ]
                                    ]
                                ]
                            ];
                        }
                    }
                   
                    $menu[] = [
                        "icon" => "fa-file-invoice-dollar",
                        "title" => "Accounting",
                        "sub_menu" => [
                            
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Requisition",
                                "link" => "/requisition",
                                "sub_menu_2" => []
                            ]
                        ]
                    ];
                    $menu[] = [
                        "icon" => "fa-thumbtack",
                        "title" => "Attendance",
                        "sub_menu" => [
                            [
                                "icon" => "fas fa-circle text-success",
                                "title" => "Attendance",
                                "link" => "/attendance",
                                "sub_menu_2" => []
                            ],
                        ]
                    ];
                    $menu[] = [
                        "icon" => "fa-luggage-cart",
                        "title" => "Leave",
                        "sub_menu" => [
                            [
                                "icon" => "fa-circle text-success",
                                "title" => "Leave",
                                "link" => "/leave",
                                "sub_menu_2" => []
                            ],
                        ]
                    ];
                    $menu[] = [
                        "icon" => "fa-calendar-check",
                        "title" => "Events Manager",
                        "sub_menu" => [
                            [
                                "icon" => "fa-circle text-success",
                                "title" => "Events",
                                "link" => "/events",
                                "sub_menu_2" => []
                            ],
                        ]
                    ];
                    
                break; 
                default:
                    # code...
                    break;
             }
          
         }
        return ($menu);            
    }
}
